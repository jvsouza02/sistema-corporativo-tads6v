# Plano de Testes

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas.
**Projeto:** Sistema de Gestão de Barbearias.

| **Seção**                     | **Detalhes**                                                                 |
| ----------------------------- | ---------------------------------------------------------------------------- |
| **Título do Plano de Testes** | Plano de Testes - Sistema de Agendamento e Gestão de Barbearias              |
| **Preparado por**             | Yuri Fernandes, Maria da Paz (Analistas de Requisito e Qualidade)            |
| **Data da Ultima Atualização**| 28/01/2026                                                                   |

## 1. Introdução

Este documento apresenta o Plano de Testes do Sistema de Agendamento e Gestão de Barbearias. Ele tem como objetivo explicar como os testes serão organizados e realizados, garantindo que todas as funcionalidades funcionem corretamente antes da entrega final.

O plano descreve o escopo do que será testado, os objetivos, a forma de execução, o cronograma, as entregas e os critérios de entrada e saída dos testes.

Esse documento serve como guia para a equipe de desenvolvimento e qualidade, garantindo que o sistema atenda aos requisitos, que os componentes se integrem corretamente (banco de dados e regras de negócio) e ofereça boa experiência ao usuário.

## 2. Escopo de Testes

**Módulos e funcionalidades a serem testados (escopo geral):**

* Criação e edição de barbearias.
* Cadastro, edição e gerenciamento de barbeiros.
* Registro, edição e exclusão de atendimentos.
* Cálculo automático de valores totais em atendimentos.
* Controle de acesso e autenticação de usuários (proprietário e barbeiro).
* Exibição de mensagens de validação e feedback do sistema.
* Visualização de histórico de atendimentos.
* Persistência e recuperação de dados no Banco de Dados - Respostas das rotas (Endpoints) da Aplicação

**Fora do escopo:**

* Testes de desempenho.
* Testes de usabilidade.
* Testes de segurança avançada (Penetration Testing)

## 3. Objetivos de Testes (foco desta etapa)

### Testes Unitários:

* Verificar se o sistema impede registrar um atendimento sem itens, garantindo que seja preciso escolher pelo menos um serviço ou produto.
* Checar se o sistema aceita itens com valor zero e faz o cálculo total corretamente.
* Testar se o sistema calcula os valores com centavos de forma certa, sem erros de arredondamento.
* Garantir que não seja possível incluir itens com valor negativo e que o sistema mostre uma mensagem de erro adequada.
* Confirmar se o valor total é atualizado automaticamente ao editar um atendimento, quando itens são adicionados, removidos ou alterados.
* Verificar se o login do barbeiro funciona corretamente, tanto quando o e-mail está cadastrado e também quando não está cadastrado.
* Assegurar que o sistema exiba as mensagens certas em cada situação, informando o usuário de forma clara e fácil de entender.

### Testes de Integração:

* Verificar se os dados de um novo atendimento são salvos corretamente no banco de dados.
* Confirmar se a exclusão de um registro remove (ou "soft deletes") o dado no banco.
* Validar se as rotas (URLs) retornam os códigos HTTP corretos (200 OK, 201 Created, 403 Forbidden, 404 Not Found).
* Testar o fluxo completo de autenticação (Log in -> Acesso a Rota Protegida).
* Garantir que as relações entre tabelas (ex: Barbeiro pertence a uma Barbearia) estejam íntegras ao salvar.

### Testes Exploratórios:

* Identificar comportamentos inesperados do sistema durante o uso livre, sem seguir roteiros pré-definidos.
* Explorar fluxos alternativos e combinações de ações que não foram cobertas nos testes unitários e de integração.
* Avaliar como o sistema reage a entradas incorretas, incompletas ou fora do padrão esperado.
* Observar mensagens de erro, alertas e feedbacks apresentados ao usuário em situações não previstas.
* Detectar possíveis falhas de lógica, inconsistências de dados ou problemas de navegação entre telas.

## 4. Abordagem de Testes

**Metodologias:**

Os testes serão divididos em três camadas:

1. **Regras de Negócio (Unitários):** Validar funções e classes isoladas.
2. **Fluxo de Dados (Integração):** Validar a comunicação entre o Controller, o Service e o Banco de Dados.
3. **Uso Livre do Sistema (Exploratórios):** Utilização do sistema como um usuário real, sem roteiro fixo.

**Tipos de testes:**

* **Testes Unitários (Caixa Branca):** Validação da lógica interna, cálculos, validações e fluxos do domínio.
* **Testes de Integração (Caixa Cinza/Preta):** Validação das rotas, verbos HTTP (GET, POST, PUT, DELETE) e integridade do banco de dados.
* **Testes Exploratórios (Caixa Preta):** Execução manual do sistema para descobrir falhas não previstas, focando na experiência e comportamento geral.

**Ferramentas utilizadas:**

**PHPUnit (Laravel):**

* Criação e execução dos testes automatizados.
* Geração de relatórios de cobertura (Coverage).

**Testes Exploratórios:**

* Execução manual no navegador.
* Uso de contas com perfis diferentes (cliente, barbeiro, administrador).
* Registro de evidências por meio de capturas de tela e anotações.

## 5. Cronograma de Testes

| **Fase**                                  | **Data de Início** | **Data de término** |
| ----------------------------------------- | ------------------ | ------------------- |
| Planejamento de testes                    | 29/10/2025         | 02/11/2025          |
| Criação dos cenários de teste (Unitários) | 07/11/2025         | 08/11/2025          |
| Execução dos testes unitários             | 09/11/2025         | 11/11/2025          |
| Criação dos cenários de Integração        | 13/12/2025         | 14/12/2025          |
| Execução dos testes de Integração         | 15/12/2025         | 16/12/2025          |
| Execução dos testes exploratórios         | 19/01/2026         | 03/02/2026          |

## 6. Entregas

* Plano de testes atualizado
* Documento de cenários de teste detalhados (Unitários, Integração e Exploratórios)
* Relatórios de execução dos testes automatizados

## 7. Critérios de Entrada e Saída

* **Para começar os testes (Entrada):**

  * O sistema precisa estar estável e funcionando
  * As funcionalidades principais devem estar prontas
  * Ambiente de testes (Banco de dados de testes) configurado

* **Para encerrar os testes (Saída):**

  * 100% dos testes automatizados planejados devem passar com sucesso
  * Nenhum problema grave identificado nos testes exploratórios pode ficar sem correção
  * Todos os fluxos principais devem funcionar sem erro
  * Cobertura de código aceitável (ex: > 70%)
