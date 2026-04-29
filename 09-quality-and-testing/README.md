# 09) Quality and Testing
##  Descrição / Description

**PT-BR:** Este módulo representa a transição do desenvolvimento amador para o profissional. Focamos na criação de um ecossistema sustentável, utilizando padrões de projeto (Design Patterns), organização rigorosa de pastas e uma suíte de testes automatizados para garantir a integridade do software.

**EN-US:** This module represents the transition from amateur to professional development. We focus on creating a sustainable ecosystem using Design Patterns, rigorous folder organization, and an automated testing suite to ensure software integrity.

---

##  Por que este módulo é interessante? / Why this module is interesting?

**PT-BR:** O grande valor deste aprendizado está na **previsibilidade**. Aprendemos que o código não deve apenas "funcionar", mas ser fácil de manter e testar. A introdução de Mocks e Injeção de Dependência nos permite simular cenários complexos sem riscos, dando ao desenvolvedor a confiança necessária para evoluir o sistema sem medo de quebrar funcionalidades antigas.

**EN-US:** The great value of this learning lies in **predictability**. We learned that code should not just "work" but be easy to maintain and test. The introduction of Mocks and Dependency Injection allows us to simulate complex scenarios without risks, giving the developer the confidence to evolve the system without fear of breaking old features.

---

##  Ferramentas e Conexões / Tools and Connections

### 1. Autoload & PSR-4
**PT-BR:** Utilizamos o **Composer** como o sistema nervoso do projeto. Através do arquivo `composer.json`, mapeamos os namespaces `App\` e `Tests\`, permitindo que o PHP localize qualquer classe instantaneamente.
**EN-US:** We used **Composer** as the project's nervous system. Through the `composer.json` file, we mapped the `App\` and `Tests\` namespaces, allowing PHP to locate any class instantly.

### 2. Front Controller (index.php)
**PT-BR:** O arquivo `index.php` atua como o ponto de entrada único (Entry Point). Ele inicializa o ambiente, carrega o Autoload e conecta as camadas de controle e utilitários.
**EN-US:** The `index.php` file acts as the single entry point. It initializes the environment, loads the Autoload, and connects the control and utility layers.

### 3. Testes e Mocks / Testing & Mocks
**PT-BR:** Implementamos testes de **Unidade** (lógica isolada) e **Integração** (fluxo entre classes). Usamos **Mocks** (dublês) para simular serviços externos, como envios de e-mail, garantindo testes rápidos e sem custos.
**EN-US:** We implemented **Unit** tests (isolated logic) and **Integration** tests (flow between classes). We used **Mocks** (doubles) to simulate external services, such as email dispatch, ensuring fast and cost-free tests.

---

##  Estrutura de Pastas / Directory Structure

* **`App/Controllers/`**: Orquestradores da lógica de negócio / Business logic orchestrators.
* **`App/Utils/`**: Ferramentas auxiliares e formatação / Helper tools and formatting.
* **`Tests/Unit/`**: Validação de lógica pura / Pure logic validation.
* **`Tests/Integration/`**: Testes de fluxo entre componentes / Component flow tests.
* **`Tests/Mocks/`**: Objetos simulados para isolamento / Simulated objects for isolation.
* **`vendor/`**: Dependências e motor de Autoload (Gerado via Composer) / Dependencies and Autoload engine (Generated via Composer).

---

### Explicação Final / Final Explanation

**PT-BR:** Este projeto conclui o Módulo 09 com uma estrutura de pastas profissional que separa o que é "Cérebro" (App) do que é "Verificação" (Tests). Ao usar o Autoload do Composer, removemos a fragilidade de caminhos manuais, tornando o sistema robusto. O uso de Mocks prova que o desenvolvedor entende como isolar componentes para garantir qualidade técnica.

**EN-US:** This project concludes Module 09 with a professional folder structure that separates "Brain" (App) from "Verification" (Tests). By using Composer's Autoload, we removed the fragility of manual paths, making the system robust. The use of Mocks proves that the developer understands how to isolate components to ensure technical quality.
