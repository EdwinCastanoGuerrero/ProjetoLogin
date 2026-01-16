

# TelaLogin


<img width="1895" height="992" alt="image" src="https://github.com/user-attachments/assets/53e83789-8e86-409e-b437-97a1ff56b178" />

<img width="1880" height="930" alt="image" src="https://github.com/user-attachments/assets/c16a88a8-645c-426d-8240-cdcf9d8ac503" />



Este é um sistema de autenticação simples desenvolvido em PHP com suporte a cadastro, login e autenticação de usuários. O projeto utiliza o banco de dados MySQL para armazenar informações dos usuários e o PHPMailer para envio de e-mails de confirmação.

---

## Funcionalidades

- **Cadastro de Usuários:**
  - Validação de campos obrigatórios.
  - Verificação de e-mail já cadastrado.
  - Envio de e-mail de confirmação (em produção).

- **Login de Usuários:**
  - Verificação de credenciais (e-mail e senha).
  - Geração de token de sessão para autenticação.

- **Área Restrita:**
  - Apenas usuários autenticados podem acessar.
  - Exibição de informações do usuário logado.

- **Logout:**
---

## Requisitos

- **Servidor Web:** Apache (recomendado com XAMPP).
- **PHP:** Versão 7.4 ou superior.
- **Banco de Dados:** MySQL.
- **Composer:** Para gerenciar dependências (PHPMailer).

---

## Configuração do Projeto

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seu-usuario/TelaLogin.git
   ```

2. **Configure o banco de dados:**
   - Crie um banco de dados chamado `login`.
   - Importe o arquivo `login.sql` para criar as tabelas necessárias.

3. **Configure o arquivo de conexão:**
   - Edite o arquivo `config/conexao.php` e atualize as credenciais do banco de dados:
     ```php
     $host = ;
     $usuario = ";
     $senha = ;
     $banco = "login";
     ```

4. **Instale as dependências:**
   - Execute o comando abaixo para instalar o PHPMailer:
     ```bash
     composer install
     ```

5. **Inicie o servidor:**
   - Use o XAMPP ou outro servidor local para iniciar o projeto.

---

## Estrutura do Projeto

```
TelaLogin/
├── config/
│   ├── conexao.php          # Configuração do banco de dados e funções auxiliares
├── class/
│   ├── processa_cadastro.php # Processamento do cadastro
├── PHPMailer/               # Biblioteca para envio de e-mails
├── css/
│   ├── estilo.css           # Estilos do projeto
├── index.php                # Tela de login
├── cadastrar.php            # Tela de cadastro
├── area_restrita.php        # Área restrita para usuários autenticados
├── logout.php               # Encerramento da sessão
├── login.sql                # Script SQL para criar tabelas
└── README.md                # Documentação do projeto
```

---

## Fluxo do Sistema

1. **Cadastro:**
   - O usuário preenche o formulário de cadastro.
   - O sistema valida os dados e armazena no banco.
   - Em produção, um e-mail de confirmação é enviado.

2. **Login:**
   - O usuário insere suas credenciais.
   - O sistema verifica o status do cadastro e autentica o usuário.

3. **Área Restrita:**
   - Apenas usuários autenticados podem acessar.
   - O sistema valida o token de sessão.

4. **Logout:**
   - O token de sessão é destruído e o usuário é redirecionado para a tela de login.

---

## Observações

- Certifique-se de que o servidor de e-mail esteja configurado corretamente para o envio de e-mails em produção.
- Para ambiente local, o envio de e-mails é desativado.

---

## Licença

Este projeto é de código aberto e está licenciado sob os termos da [MIT License](LICENSE).
