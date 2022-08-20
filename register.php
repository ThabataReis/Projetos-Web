<?php
    include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Slothbookness - Registrar</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

     <!-- Adicionando Javascript -->
     <script>
    
        function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('rua').value=("");
                document.getElementById('bairro').value=("");
                document.getElementById('cidade').value=("");
                document.getElementById('uf').value=("")
        }
    
        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }
            
        function pesquisacep(valor) {
    
            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');
    
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
    
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
    
                //Valida o formato do CEP.
                if(validacep.test(cep)) {
    
                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";
    
                    //Cria um elemento javascript.
                    var script = document.createElement('script');
    
                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
    
                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);
    
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    
        </script>

</head>

<body class="bg-gradient-primary">

    <form action="envia-register.php" method="POST">
    
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crie sua Conta!</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <b>Nome</b>
                                        <input type="text" class="form-control form-control-user" id="Name" name='nome' required>                                            
                                    </div>
                                    <div class="col-sm-6">
                                        <b>Sobrenome</b>
                                        <input type="text" class="form-control form-control-user" id="LastName" name='sobrenome' required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <b>Data de Nascimento</b>
                                        <input type="date" class="form-control form-control-user" id="date" name='dt_nasc' required>
                                    </div>
                                    <div class="col-sm-6">
                                        <b>Sexo</b>
                                        <select class="form-control form-control-user"  id="sexo" name='sexo' required>
                                            <option selected>Selecione...</option>    
                                            <option>Feminino</option>
                                            <option>Masculino</option>
                                        </select>
                                    </div>
                                </div>

                                <form class="user">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <b>Celular</b>
                                            <input type="text" class="form-control form-control-user" id="celular" name='celular'
                                            placeholder="(00)00000-0000" required>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <b>CPF</b>
                                            <input type="text" class="form-control form-control-user" id="cpf" name='cpf'
                                            placeholder="000.000.000-00" oninput="mascara(this)" required>
                                        </div>
                                    </div>
                                                                            
                                <div class="form-group">
                                   <b>Email</b>
                                    <input type="email" class="form-control form-control-user" id="Email" name='email' required>
                                </div>
                              
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <b>Senha</b>
                                        <input type="password" class="form-control form-control-user" id="password1" name='senha' required>
                                    </div>
                                    <div class="col-sm-6">
                                        <b>Repetir Senha</b>
                                        <input type="password" class="form-control form-control-user" id="password2" name='repetir_senha' required>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label><b>CEP</b>
                                            <input  type="text"  class="form-control form-control-user" id="cep" name='cep'
                                            placeholder="00.000-000" required onblur="pesquisacep(this.value);" /></label>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <b>Estado</b>
                                            <select class="form-control form-control-user" id="uf" name='estado' required>
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapá</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceará</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espírito Santo</option>
                                                <option value="GO">Goiás</option>
                                                <option value="MA">Maranhão</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Pará</option>
                                                <option value="PB">Paraíba</option>
                                                <option value="PR">Paraná</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piauí</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondônia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">São Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                            </select>
                                        </div>  
                                    </div>                         
                                
                                    <div class="form-group row">
                                        <div class="col-sm-8 mb-3 mb-sm-0">
                                           <b> Rua</b>
                                            <input type="text" class="form-control form-control-user" id="rua" name='rua' required>
                                        </div>
                                        <div class="col-sm-4">
                                            <b>Número</b>
                                            <input type="text" class="form-control form-control-user" id="numero" name='numero' required>
                                        </div>
                                    </div>
                                       
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <b>Bairro</b>
                                                <input type="text" class="form-control form-control-user" id="bairro" name='bairro' required>
                                            </div>
                                            <div class="col-sm-6">
                                              <b>  Cidade</b>
                                                <input type="text" class="form-control form-control-user" id="cidade" name='cidade' required>
                                            </div>
                                        </div>   
          
                                        <div class="form-group">
                                            <b> Palavra de Segurança</b>
                                            <input type="text" class="form-control form-control-user" id="exampleseguranca" name='palavra_chave' required>
                                        </div>
                                    

                                </div>
                            
                                <button class="btn btn-primary btn-user btn-block" type="submit">Registrar</button>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Esqueceu a senha?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Já possue conta? Entrar!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
         // Mascara de texto CPF	
        function mascara(i){
            var v = i.value;
            
            if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
                i.value = v.substring(0, v.length-1);
                return;
            }
            
            i.setAttribute("maxlength", "14");
            if (v.length == 3 || v.length == 7) i.value += ".";
            if (v.length == 11) i.value += "-";
        }

        // Validar CPF	
        function validarCPF(cpf) {	
            cpf = cpf.replace(/[^\d]+/g,'');	
            if(cpf == '') return false;	
            // Elimina CPFs invalidos conhecidos	
            if (cpf.length != 11 || 
                cpf == "00000000000" || 
                cpf == "11111111111" || 
                cpf == "22222222222" || 
                cpf == "33333333333" || 
                cpf == "44444444444" || 
                cpf == "55555555555" || 
                cpf == "66666666666" || 
                cpf == "77777777777" || 
                cpf == "88888888888" || 
                cpf == "99999999999")
                    return alert('CPF Invalido');		
            // Valida 1o digito	
            add = 0;	
            for (i=0; i < 9; i ++)		
                add += parseInt(cpf.charAt(i)) * (10 - i);	
                rev = 11 - (add % 11);	
                if (rev == 10 || rev == 11)		
                    rev = 0;	
                if (rev != parseInt(cpf.charAt(9)))		
                    return alert('CPF Invalido');		
            // Valida 2o digito	
            add = 0;	
            for (i = 0; i < 10; i ++)		
                add += parseInt(cpf.charAt(i)) * (11 - i);	
            rev = 11 - (add % 11);	
            if (rev == 10 || rev == 11)	
                rev = 0;	
            if (rev != parseInt(cpf.charAt(10)))
                return alert('CPF Invalido');		
            return true;   
        }
    </script>

     <script>
        //Verifica se as senhas são iguais
		let senha = document.getElementById('password1');
		let senhaC = document.getElementById('password2');

		function validarSenha() {
		if (senha.value != senhaC.value) {
			senhaC.setCustomValidity("Senhas diferentes!");
                $('#Button').prop('disabled', true);
			senhaC.reportValidity();
			return false;
		} else {
			senhaC.setCustomValidity("");
                $('#Button').prop('disabled', false);
			return true;
		}
		}

        // Verificar quando o campo for modificado, para que a mensagem suma quando as senhas forem iguais
        senhaC.addEventListener('input', validarSenha);
    </script>


</form>
</body>

</html>