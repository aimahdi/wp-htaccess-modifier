window.onload = function(){

let clearButton = document.getElementById('clearButton');
let replaceWithDefaultButton = document.getElementById('replaceWithDefault');
let updateCustomRuleButton = document.getElementById('updateCustomRule');

let htaccessConent = document.getElementById('htaccessDiv');

clearButton.addEventListener('click', handleClickEvent);
replaceWithDefaultButton.addEventListener('click', handleClickEvent);
updateCustomRuleButton.addEventListener('click', handleClickEvent);

function handleClickEvent(event){
    let buttonId = event.target.id;

    switch(buttonId){
        case 'clearButton': callClearData();
        break;
        case 'replaceWithDefault': callUpdateData();
        break;
        case 'updateCustomRule': callUpdateCustomRule();
        break;
    }
    
};

function callClearData(){
    fetch(ajaxurl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=clearHTACCESSData', // Add any additional data you need to send to the server
    })
    .then(function(response) {
        return response.text();
    })
    .then(function(data) {
        // Handle the server response
        htaccessConent.innerHTML = 'No Custom Rules Set';
        alert('Server response: ' + data);
        
    })
    .catch(function(error) {
        console.error('Fetch error:', error);
    });
}
function callUpdateData(){
    fetch(ajaxurl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=updateDefaultData', // Add any additional data you need to send to the server
    })
    .then(function(response) {
        return response.text();
    })
    .then(function(data) {
        // Handle the server response
        htaccessConent.innerHTML = `
        # BEGIN WordPress <br>
    <IfModule mod_rewrite.c> <br>
    RewriteEngine On <br>
    RewriteBase / <br>
    RewriteRule ^index\.php$ - [L] <br>
    RewriteCond %{REQUEST_FILENAME} !-f <br>
    RewriteCond %{REQUEST_FILENAME} !-d <br>
    RewriteRule . /index.php [L] <br>
    </IfModule> <br>
    # END WordPress <br>
        `.trim();
        alert('Server response: ' + data);
        
    })
    .catch(function(error) {
        console.error('Fetch error:', error);
    });
}

function callUpdateCustomRule(){
    alert('Please update the custom rule using your file manager');
}
}