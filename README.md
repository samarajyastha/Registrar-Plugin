# Registrar-Plugin


*   Create a user registration form having fields like User Email, Password, First name, 
    Last name, review text area field Where user can enter what they like about our products and a
    review field ( can be a simple number field where user can insert review out of 5, remember 
    to use max and min attributes of number field or you can create a range slider out of it, 
    you are free to use any js libraries to create range field interface if you decide to create 
    a range slider but range slider field is not mandatory ). @copy;
	
*   When a user submits the form, create a custom filter hook  where the user data is sent, 
    and create a functionality where the username field is extracted from email of the user 
    and use the above filter to achieve this functionality and then only after that insert 
    the user data in the database.
	
*   When the user is successfully registered create a custom action hook and 
    create a functionality which utilizes this action hook to send a successfully 
    registered email to the registered user.

*   After performing the above task, create a HTML template to render all the 
    reviews set by your users during registration and display them as a grid 
    ( You can give beautiful design to your html template but it is not mandatory, you can 
    give simple css to it ).

*   Each review card or grid of a user must display his Full Name, Email, review rating 
    and review description as recorded by your form.

*   After all the reviews have been listed, Place a filter at the top which can filter 
    out users reviews based on 1 to 5 ratings and another latest filter to render the reviews 
    list according to user registered date.
	
*   The page must use pagination to render only 5 reviews at a time.

*   The list must be visible only to the logged in user. A guest user 
    ( not logged in user ) will see either a blank page or a message that he's not authorized 
    to see the content (either is good). 

*   The review and latest filter must both work via AJAX, and pagination should work via 
    AJAX as well. 
	
*   If any of the review filter lets say rating 2 has not been given by any user then a message 
    must be shown in the Page.

*   The plugin must be translation-ready, properly sanitized, nonces must be checked and 
    escaping must be done. 

*   Please give the table a basic styling for desktop view. No need to make it responsive. 

*   PHP version: please assume the version officially supported by WordPress or make a version check. 
	


