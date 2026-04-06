# 2)Service Abstraction & Dependency Injection 

## Descricao / Description

**PT-BR:** Este modulo foca na implementacao de um Service Container manual para gerenciar a Inversao de Controle (IoC). O objetivo principal foi transformar um codigo rigido em uma arquitetura flexivel, onde as classes nao sabem como seus servicos sao criados, apenas o que eles fazem.

**EN-US:** This module focuses on implementing a manual Service Container to manage Inversion of Control (IoC). The main goal was to transform rigid code into a flexible architecture, where classes don't know how their services are created, only what they do.

---

## Arquitetura e Arquivos / Architecture & Files

| Arquivo / File | Camada / Layer | Responsabilidade / Responsibility |
| :--- | :--- | :--- |
| ILogger.php | Contracts | Interface que define o metodo de log. / Interface defining the log method. |
| INotificationService.php | Contracts | Interface para servicos de envio. / Interface for delivery services. |
| FileLogger.php | Implementations | Gera logs com Request ID unico para rastreamento. / Generates logs with unique Request ID for tracing. |
| EmailNotification.php | Implementations | Envio de e-mail com validacao de sintaxe. / Email delivery with syntax validation. |
| SmsNotification.php | Implementations | Envio de SMS com sanitizacao de numeros (Regex). / SMS delivery with number sanitization (Regex). |
| ServiceContainer.php | Core | O motor que resolve as dependencias via Closures. / The engine resolving dependencies via Closures. |
| main.php | Entry Point | Execucao dinamica baseada em parametros da URL. / Dynamic execution based on URL parameters. |

---

## Funcionalidades Implementadas (Feats) / Key Features

### 1. Rastreabilidade (Request ID)
O FileLogger identifica cada execucao com um ID unico (ex: [REQ-a1b2c]). Isso permite filtrar logs de uma mesma requisicao em ambientes de alto trafego.

### 2. Sanitizacao de Dados (SMS Clean)
O SmsNotification utiliza expressoes regulares (preg_replace) para limpar o numero do destinatario, aceitando formatos como (11) 99999-8888 e convertendo para 11999998888.

### 3. Validacao de Negocio (Email Guard)
Adicionada uma camada de protecao no EmailNotification que impede o envio caso o endereco de e-mail nao contenha o caractere @.

### 4. Alternancia Dinamica
O main.php foi refatorado para ler parametros via $_GET. Agora e possivel testar diferentes implementacoes apenas mudando a URL:
* ?tipo=sms -> Injeta o servico de SMS.
* ?tipo=email -> Injeta o servico de E-mail.

---

## Fundamentos Tecnicos / Technical Foundations

**PT-BR:**
A transicao de instanciar classes manualmente para solicitar ao Container e o divisor de aguas entre um script simples e um sistema profissional. Durante este modulo, superamos desafios tecnicos:
* PSR-4 Autoloading: Configuracao do Composer para mapear namespaces e pastas.
* Strict Typing: Correcao de erros de compatibilidade de interface (: string) e cumprimento de contratos.
* Desacoplamento: Capacidade de trocar o Logger ou o Servico de Notificacao sem alterar as classes de negocio.

**EN-US:**
Moving from manually instantiating classes to requesting from the Container is the turning point between a simple script and a professional system. During this module, we overcame technical challenges:
* PSR-4 Autoloading: Composer setup to map namespaces and directories.
* Strict Typing: Fixing interface compatibility errors (: string) and enforcing contracts.
* Decoupling: The ability to swap the Logger or Notification Service without changing business classes.

---

## Como Testar / How to Test

1. No terminal, atualize o autoload:
   php composer.phar dump-autoload -o

2. Inicie o PHP Server:
   php -S localhost:8000

3. Teste os diferentes servicos via URL:
   - SMS: http://localhost:8000/main.php?tipo=sms&mensagem=Teste_SMS
   - Email: http://localhost:8000/main.php?tipo=email&mensagem=Teste_Email

---

## Conclusao / Conclusion
Este projeto solidifica os principios SOLID, especialmente o DIP (Dependency Inversion Principle), preparando a base para o desenvolvimento em frameworks modernos como Laravel e Symfony.
