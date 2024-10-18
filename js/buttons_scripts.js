$('#choice_registration_form').on('click', function(){
    document.getElementById('choice_container').style.display = 'none';
    document.getElementById('registration_container').style.display = 'block';
    document.getElementById('user_login_reg').style.border = '';
    document.getElementById('login_reg_error').style.display = 'none';
    document.getElementById('user_pass_reg').style.border = '';
    document.getElementById('pass_reg_error').style.display = 'none';
    document.getElementById('user_description_reg').style.border = '';
    document.getElementById('description_error').style.display = 'none';
    document.getElementById('user_age_reg').style.border = '';
    document.getElementById('age_error').style.display = 'none';
    document.getElementById('reg_panel').style.display = 'block';
    document.getElementById('success_reg_panel').style.display = 'none';
});

$('#choice_authentication_form').on('click', function(){
    document.getElementById('choice_container').style.display = 'none';
    document.getElementById('login_container').style.display = 'block';
});

$('#cancel_registration').on('click', function(){
    document.getElementById('choice_container').style.display = 'block';
    document.getElementById('registration_container').style.display = 'none';
    document.getElementById('user_login_reg').value = '';
    document.getElementById('user_pass_reg').value = '';
    document.getElementById('user_description_reg').value = '';
    document.getElementById('user_age_reg').value = '';
});

$('#cancel_authentication').on('click', function(){
    document.getElementById('choice_container').style.display = 'block';
    document.getElementById('login_container').style.display = 'none';
    document.getElementById('user_login_log').value = '';
    document.getElementById('user_pass_log').value = '';
    document.getElementById('user_login_log').style.border = '';
    document.getElementById('user_pass_log').style.border = '';
    document.getElementById('user_login_log_error').style.display = 'none';
    document.getElementById('user_pass_log_error').style.display = 'none';
});

$('#confirm_registration').on('click', function(){
    let login = document.getElementById('user_login_reg').value;
    let pass = document.getElementById('user_pass_reg').value;
    let description = document.getElementById('user_description_reg').value;
    let age = Number(document.getElementById('user_age_reg').value);
    let login_check = false;
    let pass_check = false;
    let pass_check_digits = false;
    let pass_check_letters = false;
    let pass_check_special_chars = false;
    let description_check = false;
    let age_check = false;
    const contains_digits = /\d/;
    const contains_letters_kiril = /[яА-ЯЁё]/;
    const contains_letters = /[a-zA-Zа]/;
    const contains_special_chars = /[!@#$%^&*(),.?":{}|<>]/;
    if (contains_digits.test(login) || login.length < 5 || login == '' || contains_letters_kiril.test(login)) {
        document.getElementById('user_login_reg').style.border = '2px solid red';
        document.getElementById('login_reg_error').style.display = 'flex';
        login_check = false;
    } else {
        login_check = true;
    }
    if (contains_digits.test(pass)) {
        pass_check_digits = true;
    } else{
        pass_check_digits = false;
    }
    if (contains_letters.test(pass)){
        pass_check_letters = true;
    } else{
        pass_check_letters = false;
    }
    if (contains_special_chars.test(pass)){
        pass_check_special_chars = true;
    } else{
        pass_check_special_chars = false;
    }
    if (pass_check_digits === true && pass_check_letters === true && pass_check_special_chars === true && pass.length >=7){
        pass_check = true;
    } else{
        document.getElementById('user_pass_reg').style.border = '2px solid red';
        document.getElementById('pass_reg_error').style.display = 'flex';
        pass_check = false;
    }
    if (description.length < 50 || description == ''){
        document.getElementById('user_description_reg').style.border = '2px solid red';
        document.getElementById('description_error').style.display = 'flex';
        description_check = false;
    }else {
        description_check = true;
    }
    if (age >= 10 && age <=85){
        age_check = true;
    } else{
        document.getElementById('age_error').style.display = 'flex';
        document.getElementById('user_age_reg').style.border = '2px solid red';
    }
    if(login_check === true && pass_check === true && description_check === true && age_check === true){
        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: {login: `${login}`, pass: `${pass}`, description: `${description}`, age: `${age}`},
            success: function(response){
                document.getElementById('success_reg_panel').style.display = 'flex'
                document.getElementById('reg_panel').style.display = 'none';

            }
        })
    }
});

$('#confirm_authentication').on('click', function(){
    let login = document.getElementById('user_login_log').value;
    let pass = document.getElementById('user_pass_log').value;
    if (login.length > 0 && login.length <= 15 && pass.length >= 7 && pass.length <= 15){
        $.ajax({
            type: 'POST',
            url: 'authentication.php',
            data: {login: `${login}`, pass: `${pass}`},
            dataType: 'json',
            success:
            function (data){
                if (data.result === 'none user'){
                    document.getElementById('user_login_log_error').style.display = 'flex';
                    document.getElementById('user_login_log').style.border = '2px solid red';
                };
                if (data.result === 'wrong password'){
                    document.getElementById('user_pass_log_error').style.display = 'flex';
                    document.getElementById('user_pass_log').style.border = '2px solid red';
                };
                if (data.result === 'success'){
                    $.ajax({
                        type: 'POST',
                        url: 'last_registreted_users.php',
                        dataType: 'json',
                        success:
                        function (data){
                            let last_users = data.last_users_data;
                            if (last_users.length > 0){
                                for (let i = 0; i < last_users.length; i++){
                                    last_users[i][1] = Number(last_users[i][1]);
                                }
                                last_users.sort((a, b) => {
                                    return a[1] - b[1];
                                });
                                for (let i = 0; i < last_users.length; i++){
                                    const table_body = document.getElementById('table_body');
                                    const row = document.createElement('tr'); 
                                    row.innerHTML = `
                                        <th scope="row">${i+1}</th>
                                        <td>${last_users[i][0]}</td>
                                        <td>${last_users[i][1]}</td>
                                        <td>${last_users[i][2]}</td>
                                    `;
                                    table_body.appendChild(row);
                                }
                            }
                            const user_count = document.getElementById('new_user_count');
                            const label = document.createElement('div');
                            label.innerHTML = `Зарегистрировано ${last_users.length} пользователей за последние 6 минут`;
                            user_count.appendChild(label);
                            document.getElementById('success_authentication').style.display = 'block';
                            document.getElementById('login_container').style.display = 'none';

                        }
                    })
                }
            }
        })
    }

});