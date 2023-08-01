# OMC_BankIsrael_API
 Task in php - fetch information from the Bank of Israel on usd, eur, gbp currencies
Technologies Used
HTML: For the structure and layout of the web pages.
CSS: For styling the web pages and making them visually appealing.
PHP: For server-side scripting and handling data processing.
MySQL: As the database management system to store the fetched exchange rate data.
Bank of Israel API: To fetch real-time exchange rate data.
Project Flow
The user visits the web application and is presented with a simple user interface.
The user selects a currency from the dropdown menu (USD, EUR, or GBP) and submits the form.
The PHP script running on the server receives the user's selection and constructs the API URL based on the selected currency.
The PHP script fetches the exchange rate data from the Bank of Israel API using the file_get_contents() function and parses the response to extract relevant information using SimpleXML.
The parsed data is then stored in an array, and the application establishes a connection to the MySQL database using the mysqli extension.
The fetched exchange rate data is then inserted into two database tables:
The currencies table stores the names of the currencies (USD, EUR, GBP).
The exchange_rates table stores the historical exchange rates and their corresponding dates for each currency.
If the data insertion is successful, the application displays a success message, and the user can view the historical exchange rates for the selected currency in a table format.
If there is an error fetching data from the API or inserting it into the database, the application displays an appropriate error message.
