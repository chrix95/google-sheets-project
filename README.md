## About Google Sheet Project
This project allows you dynamically store data into rows of a google sheet. Instead of using a regular database, it serves as a database on your google drive.

## Setting up the project
1. Clone the project into your working directory
2. Run `composer install` to download all dependencies
3. Rename the `.env.example` file to `.env`
4. Run `php artisan key:generate` to insert a new key into your .env file

## Set up Google credentials (API Key) & .env credentials
1. Prepare your google credentails for the project
   - Go to https://developers.google.com/console and sign in if not signed in
   - Create a new project
   - Click on "credentials" from the left-hand menu
   - Click "Create credentials" followed up “OAuth client ID”
   - "Configure consent screen" is required for every google application to understand what your project is about
   - Set the type to "Web application"
   - Copy the "Client ID" (leave this window open)
   - Open /.env and set as the value for GOOGLE_CLIENT_ID=
   - Go back to the Google Console and copy the "Client Secret"
   - Open /.env and set as the value for GOOGLE_CLIENT_SECRET=

2. Setup your google sheet
   - Open http://sheets.google.com and create a new document
   - Give your new Sheet a name or leave it that way
   - Give the specific sheet (tab) a name
   - Copy the ID of the document from the URL
   - Open /.env and set the ID from the URL (the value within /d/SPREADHEET_ID/edit) as the value for POST_SPREADSHEET_ID=
   - Open /.env and set the sheet (tab) name as the value for SPREADSHEET_NAME=

3. Set up Google credentials (Service account key)
   - Go back to the developer console and create a new "Service account key"
   - Provide the service name, the next field will be automatically generated based on the service name, and click on the create button. Then from the role dropdown, (Role dropdown > Project > Owner)
   - The third field is optional so you can click on done
   - Click on the manage service account on top of the Service Account table and click the action button and select create key 
   - Type should be “JSON” and the file will be downloaded to your system
   - Save the .json file under the project’s /storage/ folder as “credentials.json” (and upload to the server if applicable)
   - Copy the email address for the service account we just created within the manage service accounts

4. Set permission on Google Sheet
   - On your google sheet wwe created earlier,
   - Click on share and Paste the email address for the service account and make sure to give it “edit” access

5. Enable required Google APIs
   - Return to the main Developer Dashboard (https://console.developers.google.com/apis/dashboard)
   - Click "ENABLE API AND SERVICES"
   - In the search box, type "drive api" and click on the "Google Drive API" option and click on "ENABLE"
   - In the search box, type "sheet api" and click on the "Google Sheet API" option and click on "ENABLE"

6. Final configuration on .env <br>
  Ensure you move the credentials.json file we downloaded earlier to your storage project of your laravel project and don't forget tp add it to the .gitignore file.
   - GOOGLE_SERVICE_ENABLED=true
   - GOOGLE_SERVICE_ACCOUNT_JSON_LOCATION=../storage/credentials.json
   - Go to config folder and update the google.php file, set the scopes to [\Google_Service_Sheets::DRIVE, \Google_Service_Sheets::SPREADSHEETS]

## Postman Collection for the API
Two endpoint exist, 
- Single Information Upload &
- Multiple Information Upload (This can also be used to upload a single information)

###### Click <a href="https://www.getpostman.com/collections/e25c90504c4fed110686">here</a> to import the postman collection