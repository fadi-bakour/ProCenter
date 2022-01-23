#Users

-   Report object

```
{
    'id' : bigIncrements
    'user_id : unsignedBigInteger
    'user_email' : string
    'email_content' : string
    'delivered' : boolean
    'create_at' : Date
    'updated_at' : Date
}
```

## **GET /reports**

Returns a view of all the reports of the sent emails.

-   **Success Response:**  
    returns all reports

## **GET /reports/create**

Returns a view create a new report and send by email.

-   **Success Response:**  
    returns a view with a form containing inputs for email and content

## **POST /reports**

Creates a new Report and sends an email to the user.

-   **Success Response:**  
     creates a new report and sends an email to the provided registered email user
    _Required:_ `email=[string]`
    _Required:_ `content=[string]`
