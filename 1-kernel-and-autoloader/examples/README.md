# 🚀 Kernel Examples | Exemplos do Kernel

[English](#english) | [Português](#portugues)

---

<a name="english"></a>
## 🇺🇸 English: Core Implementation
This directory contains the integration tests for the three main pillars of the architecture.

### 🛠️ Components:
- **Config Echo (49 lines):** Environment variable injector.
- **Security Error (39 lines):** Global exception shield.
- **Autoloader (120 lines):** PSR-4 compliant dependency resolution.

### 🖥️ How to Run:
1. Ensure your `.env` is configured.
2. Run `php bootstrap.php` to see the kernel initialization.
3. Check the `storage/logs/` for any intercepted exceptions.

---

<a name="portugues"></a>
## 🇧🇷 Português: Implementação do Core
Este diretório contém os testes de integração para os três pilares principais da arquitetura.

### 🛠️ Componentes:
- **Config Echo (49 linhas):** Injetor de variáveis de ambiente.
- **Security Error (39 linhas):** Escudo global de exceções.
- **Autoloader (120 linhas):** Resolução de dependências compatível com PSR-4.

### 🖥️ Como Executar:
1. Certifique-se de que seu `.env` está configurado.
2. Execute `php bootstrap.php` para ver a inicialização do kernel.
3. Verifique a pasta `storage/logs/` para ver exceções interceptadas.
