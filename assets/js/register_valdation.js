function save_data()
{
    var form_element = document.getElementsByClassName('form_data');

    var form_data = new FormData();

    for(var count = 0; count < form_element.length; count++)
    {
        form_data.append(form_element[count].name, form_element[count].value);
    }

    document.getElementById('submit').disabled = true;

    var ajax_request = new XMLHttpRequest();

    ajax_request.open('POST', 'Controller/RegisterCheck.php');

    ajax_request.send(form_data);

    ajax_request.onreadystatechange = function()
    {
        if(ajax_request.readyState == 4 && ajax_request.status == 200)
        {
            document.getElementById('submit').disabled = false;

            var response = JSON.parse(ajax_request.responseText);
            var gender = document.getElementById('gender').value;

            if(response.success != '')
            {

                document.getElementById('sample_form').reset();

                document.getElementById('message').innerHTML = response.success;

                setTimeout(function(){
                    window.location.href = ("http://gate.test/?action=welcome"+ gender);
                }, 5000);
                document.getElementById('name_error').innerHTML = '';
                document.getElementById('email_error').innerHTML = '';
                document.getElementById('password_error').innerHTML = '';
                document.getElementById('confirm_password_error').innerHTML = '';
                document.getElementById('website_error').innerHTML = '';
                document.getElementById('picture_error').innerHTML = '';
                document.getElementById('gender_error').innerHTML = '';
                document.getElementById('terms_error').innerHTML = '';
            }
            else
            {
                //display validation error
                document.getElementById('name_error').innerHTML = response.name_error;
                document.getElementById('email_error').innerHTML = response.email_error;
                document.getElementById('password_error').innerHTML = response.password_error;
                document.getElementById('confirm_password_error').innerHTML = response.confirm_password_error;
                document.getElementById('website_error').innerHTML = response.website_error;
                document.getElementById('picture_error').innerHTML = response.picture_error;
                document.getElementById('gender_error').innerHTML = response.gender_error;
                document.getElementById('terms_error').innerHTML = response.terms_error;
                console.log(response)
            }


        }
    }
}

function reset(){
    document.getElementById('sample_form').reset();

}





