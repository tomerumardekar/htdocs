<?php
ini_set('allow_url_fopen', 1);


include 'server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedCurrency = $_POST["currency"];
    $apiUrl = '';

    if ($selectedCurrency === "usd") {
        $apiUrl = 'https://edge.boi.gov.il/FusionEdgeServer/sdmx/v2/data/dataflow/BOI.STATISTICS/EXR/1.0/RER_USD_ILS?startperiod=2023-01-01&endperiod=2024-01-01';
    } else if ($selectedCurrency === "eur") {
        $apiUrl = 'https://edge.boi.gov.il/FusionEdgeServer/sdmx/v2/data/dataflow/BOI.STATISTICS/EXR/1.0/RER_EUR_ILS?startperiod=2023-01-01&endperiod=2024-01-01';
    } else if ($selectedCurrency === "gbp") {
        $apiUrl = 'https://edge.boi.gov.il/FusionEdgeServer/sdmx/v2/data/dataflow/BOI.STATISTICS/EXR/1.0/RER_GBP_ILS?startperiod=2023-01-01&endperiod=2024-01-01';
    }

    $data = file_get_contents($apiUrl);
    if ($data === FALSE) {
        echo "There was an error fetching data from the API.";
        exit;
    }

  
    $result = array();
    try {
        libxml_use_internal_errors(true);
        $xml = new SimpleXMLElement($data);
        if ($xml === false) {
            echo "Failed loading XML: ";
            foreach(libxml_get_errors() as $error) {
                echo "<br>", $error->message;
            }
            exit;
        }

        $xml->registerXPathNamespace('m', 'http://www.sdmx.org/resources/sdmxml/schemas/v2_1/message');
        $dataSet = $xml->xpath('//m:DataSet');
        foreach ($dataSet[0]->Series->Obs as $obs) {
            $row = array();
            $row['date'] = (string)$obs['TIME_PERIOD'];
            $row['rate'] = (string)$obs['OBS_VALUE'];
            $result[] = $row;
        }
    } catch (Exception $e) {
        echo "Failed to parse the XML data. Error: " . $e->getMessage();
        exit;
    }

    
    foreach ($result as $currencyData) {
        $currency = $selectedCurrency;
        $rateDate = $currencyData['date'];
        $rate = $currencyData['rate'];

        $stmt = $conn->prepare("REPLACE INTO currencies (name) VALUES (?)");
        $stmt->bind_param("s", $currency);
        $stmt->execute();
        
        $currencyId = $conn->insert_id;

        $stmt = $conn->prepare("INSERT INTO exchange_rates (currency, date, rate) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $currencyId, $rateDate, $rate);
        $stmt->execute();
    }
}
?>
