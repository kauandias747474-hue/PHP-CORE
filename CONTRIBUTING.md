# Contributing / Contribuição / Contribución

### 🇺🇸 English: Contributing Guidelines
This project focuses on **Zero-Magic** engineering.
1. **No Frameworks:** Do not introduce heavy dependencies. Logic must be built within our modules.
2. **Strict Typing:** All code must use `declare(strict_types=1);` and full type hinting.
3. **Architecture:** Maintain DDD isolation. Do not leak Infrastructure details into the Business Domain.
4. **Testing:** New features require Unit Tests with Mocks. Run `composer test` before submitting.

### 🇧🇷 PT-BR: Diretrizes de Contribuição
Este projeto foca em engenharia **"Zero-Magic"**.
1. **Sem Frameworks:** Não introduza dependências pesadas. Toda lógica deve ser construída dentro dos nossos módulos.
2. **Tipagem Estrita:** Todo código novo deve usar `declare(strict_types=1);` e tipagem completa.
3. **Arquitetura:** Mantenha o isolamento via DDD. Não exponha detalhes de infraestrutura na Lógica de Negócio.
4. **Testes:** Novos recursos exigem Testes Unitários com Mocks. Execute `composer test` antes de enviar o PR.

### 🇪🇸 ES-ES: Directrices de Contribución
Este proyecto se centra en la ingeniería **"Zero-Magic"**.
1. **Sin Frameworks:** No introduzcas dependencias pesadas. La lógica debe construirse dentro de nuestros módulos.
2. **Tipado Estricto:** Todo código debe usar `declare(strict_types=1);` y tipado completo.
3. **Arquitectura:** Mantén el aislamiento DDD. No expongas detalles de infraestructura en la Lógica de Negocio.
4. **Pruebas:** Las nuevas funcionalidades requieren Pruebas Unitarias con Mocks. Ejecuta `composer test` antes de enviar el PR.
