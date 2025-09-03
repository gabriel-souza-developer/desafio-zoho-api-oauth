<p align="center">
  <a href="#projeto">Projeto</a>   |   
  <a href="#funcionalidades">Funcionalidades</a>   |   
  <a href="#layout">Layout</a>   |   
  <a href="#elementosprincipais">Elementos Principais</a>   |   
  <a href="#tecnologias-ferramentas">Tecnologias & Ferramentas</a>   |   
  <a href="#autor">Autor</a>
</p>

## Sobre o projeto

Uma aplicação web desenvolvida para demonstrar a **integração com a API Zoho via OAuth2**, permitindo login e logout com a conta corporativa Zoho.  
O projeto tem foco na **autenticação segura**, **manipulação de tokens** e **exibição condicional de conteúdo** para usuários autenticados.  

Além disso, utilizamos o **ngrok** para expor o servidor local na internet, viabilizando o callback da API Zoho durante os testes de desenvolvimento.

<h2 id="projeto">Apresentação do projeto:</h2> 

📹 **Demonstração em vídeo:**

<video controls>
  <source src="https://raw.githubusercontent.com/gabriel-souza-developer/desafio-zoho-api-oauth/main/assets/img/Localhost%20com%20direcionamento%20para%20github-pages.mp4" type="video/mp4">
  Seu navegador não suporta o elemento de vídeo.
</video>

**Responsivo:** A interface se adapta a diferentes tamanhos de tela, de desktops a dispositivos móveis.

<h2 id="funcionalidades">Funcionalidades:</h2>

*   **Login via Zoho OAuth2:** Permite que o usuário se autentique com a conta corporativa Zoho.
*   **Logout seguro:** Permite encerrar a sessão do usuário de forma limpa.
*   **Exibição condicional de conteúdo:** O conteúdo da página muda dependendo se o usuário está autenticado ou não.
*   **Cabeçalho dinâmico:** O botão de login/logout no header se altera conforme o estado de autenticação.
*   **Mensagens de status:** Mostra mensagem de sucesso após login ou alerta em caso de erro na autenticação.
*   **Integração com sessão PHP:** Gerencia tokens de acesso usando `$_SESSION`.

## 💻 Deploy:

- 📹 Confira o vídeo de deploy e funcionamento acima.

<h2 id="layout">🔖 Layout:</h2> 

O layout segue a paleta de cores da Proxxima Telecom, priorizando **clareza, simplicidade e responsividade**.  
O conteúdo está centralizado, com foco no login, mensagens de status e logout.  

A cor principal do projeto é **#2B3591**.

<h2 id="elementosprincipais">Elementos principais da página:</h2>

* Cabeçalho (`app-header`) com título do projeto e botão de login/logout.
* Card central (`app-card`) exibindo:
  * Logo da Proxxima Telecom.
  * Mensagem de login realizado com sucesso.
  * Botão de Logout.
* Footer com informações do autor e link para GitHub.

<h2 id="tecnologias-ferramentas">Tecnologias & Ferramentas:</h2>

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![Bootstrap](https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![Font Awesome](https://img.shields.io/badge/Font%20Awesome-394A59?style=for-the-badge&logo=font%20awesome&logoColor=%236AF)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![ngrok](https://img.shields.io/badge/ngrok-1F1E37?style=for-the-badge&logo=ngrok&logoColor=white)
![Visual Studio Code](https://img.shields.io/badge/Visual%20Studio%20Code-0078d7.svg?style=for-the-badge&logo=visual-studio-code&logoColor=white)

### Tópicos abordados durante o projeto:

*   **PHP:**
    * Início de sessão com `session_start()` para controlar login/logout.
    * Controle de autenticação com OAuth2 do Zoho.
    * Uso de `$_SESSION` para armazenar o access token.
    * Controle condicional para exibir conteúdo baseado no estado do login.
    * Comunicação com a API via `cURL`.
*   **JavaScript:** (planejado para evoluções futuras)
    * Manipulação do DOM para possíveis interações.
*   **HTML5 & CSS3:**
    * Estrutura semântica da página (`header`, `main`, `footer`).
    * Layout responsivo usando Flexbox.
    * Paleta de cores padronizada com variáveis CSS.
    * Componentização visual usando classes como `app-card`, `btn-zoho`, etc.
*   **ngrok:**
    * Utilizado para expor o servidor local à internet.
    * Permitiu testar o fluxo OAuth2 do Zoho, já que o **redirect_uri** precisa ser acessível externamente.

<h3 id="autor">Autor</h3>

* Gabriel A. Souza - Backoffice Redes
    *   <a href="https://www.linkedin.com/in/gabriel-albuquerque-souza/" target="_blank" >![LinkedIn](https://img.shields.io/badge/linkedin-%230077B5.svg?style=for-the-badge&logo=linkedin&logoColor=white)</a>
    *   <a href="mailto:contato_gabriel_albuquerque@hotmail.com" target="_blank" >![GMAIL](https://img.shields.io/badge/GMAIL-D14836.svg?style=for-the-badge&logo=gmail&logoColor=white)</a>
    *   <a href="https://www.instagram.com/gabriel.datt/" target="_blank" >![instagram](https://img.shields.io/badge/-Instagram-%23E4405F?style=for-the-badge&logo=instagram&logoColor=white)</a>
    *   <a href="https://github.com/gabrieldev071" target="_blank" >![GitHub](https://img.shields.io/badge/github-18212d.svg?style=for-the-badge&logo=github&logoColor=white)</a>
