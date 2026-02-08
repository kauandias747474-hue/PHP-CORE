# 🧠 Core System Logic

**PT-BR:** O coração da aplicação. Esta camada é responsável pelo ciclo de vida da requisição, orquestração do Kernel e regras de negócio puras. É projetada para ser independente de qualquer driver externo.
**EN-US:** The heart of the application. This layer is responsible for the request lifecycle, Kernel orchestration, and pure business rules. It is designed to be independent of any external drivers.

---

## 🛠️ Componentes / Components

1. **Kernel.php:** Ponto de entrada para processamento e inicialização do sistema.
2. **Domain:** Entidades e regras de negócio determinísticas.
3. **Exceptions:** Hierarquia de erros customizada para falhas de lógica e runtime.
4. **Validation:** Motores de validação de tipos e integridade de dados.

> **Design Note:** "Keep the Core pure." — Sem dependências de I/O ou infraestrutura aqui.
