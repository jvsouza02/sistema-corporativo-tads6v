# Documento de Visão do Produto — Sistema de Agendamento e Gestão para Barbearias

## 1. Visão Geral do Produto
Uma **plataforma web** que centraliza o gerenciamento de barbearias: cadastro da barbearia e profissionais, configuração de serviços, agendamento e calendário, registro de atendimentos no histórico, controle de status de agendamentos (reservado / finalizado / expirado) e mecanismos de avaliação pós-atendimento. O produto visa reduzir atritos no agendamento e permitir personalização do atendimento via histórico.

### 1.1. Minimundo
A plataforma de agendamento e gestão de barbearias organiza serviços de cortes de cabelo, barba e coloração capilar, permitindo que clientes, barbeiros e proprietários gerenciem atendimentos de forma prática e eficiente. Ela oferece ferramentas para controle de agendamentos e apresenta relatórios de desempenho por meio de gráficos, facilitando a gestão do negócio e aprimorando a experiência dos clientes.

O proprietário realiza seu cadastro informando dados pessoais como nome, telefone, e-mail e senha. Em seguida, ele é direcionado para o cadastro da barbearia, onde registra informações como nome, CNPJ, e-mail, endereço, telefone, descrição e foto. A plataforma permite que um mesmo proprietário tenha várias barbearias, podendo cadastrar e gerenciar cada unidade de forma independente. Após cadastrar uma barbearia, o proprietário acessa o painel de gerenciamento, centralizando todas as funções administrativas e operacionais. O proprietário pode ver uma listagem das suas barbearias e, ao clicar em cada barbearia, visualizar os agendamentos do dia.

No painel de gerenciamento, o proprietário pode cadastrar e gerenciar barbeiros, definindo horários de trabalho, atribuindo tarefas e registrando informações como nome, e-mail, senha, telefone, cargo, salário e foto, além de cadastrar e administrar os serviços oferecidos, organizados em categorias como Corte de Cabelo, Barba e Coloração Capilar, registrando nome, descrição, preço, duração e tipo de serviço, abrangendo diferentes estilos e técnicas. Um calendário de agendamentos permite ao proprietário e aos barbeiros visualizar horários disponíveis e consultar agendamentos por dia, barbearia ou profissional, sendo possível criar agendamentos manuais e gerenciar toda a agenda da barbearia.

O barbeiro consulta sua agenda, realiza atendimentos e registra no histórico os detalhes de cada serviço executado, incluindo o tipo de serviço realizado (como corte, barba ou coloração capilar), os produtos utilizados (como shampoos, condicionadores, loções ou tintas de cabelo) e observações sobre o cliente. Cada agendamento possui um status que indica se o serviço ainda não foi iniciado ou está em andamento (reservado), se o atendimento foi concluído (finalizado) ou se o cliente faltou (expirado).

Na área do cliente, os usuários podem criar suas contas informando nome, e-mail, telefone e senha, pesquisar barbearias e serviços disponíveis, e realizar agendamentos escolhendo a data, o horário e o tipo de serviço desejado. Após o atendimento, os clientes podem acessar o histórico de agendamentos para consultar todos os serviços realizados e avaliar cada atendimento com notas e comentários, registrando suas impressões sobre a experiência.

A plataforma centraliza todas as operações da barbearia em um único ambiente, desde o cadastro e gerenciamento de barbearias por parte do proprietário até o agendamento de serviços pelos clientes. O sistema oferece ferramentas de controle, relatórios e gráficos de desempenho, proporcionando maior eficiência, organização e uma experiência satisfatória para clientes, barbeiros e proprietários.

## 2. Público-alvo
- **Proprietário** — administra a barbearia, gerencia horários, profissionais, serviços, visualiza relatórios e mantém históricos de atendimento.  
- **Cabeleireiro / Profissional** — consulta sua agenda, registra atendimentos e adiciona observações no histórico.  
- **Cliente** — cria conta, pesquisa serviços, reserva horário, visualiza histórico de atendimentos e avalia serviços. 

## 3. Necessidade de Negócio / Justificativa
- **Operacional:** eliminar uso de papel, reduzir conflitos de horário e facilitar bloqueios/manutenção da agenda.  
- **Comercial:** melhorar retenção e ticket médio ao possibilitar atendimento personalizado (uso do histórico de atendimentos).  
- **Decisional:** fornecer dados para o proprietário sobre frequência, serviços mais procurados e desempenho dos profissionais.

## 4. Escopo (o que está incluído / excluído)
**Incluído:**
- Cadastro de barbearia, profissionais e serviços.  
- Calendário/agenda por profissional.  
- Agendamento pelo cliente (data, horário, serviço).  
- Registro de atendimento / histórico (comentários com data/hora).  
- Alteração de status de agendamento (reservado, finalizado, expirado).  
- Autenticação básica e controle de papéis (cliente, cabeleireiro, proprietário).  

**Excluído:**
- Módulo de pagamentos ou transações financeiras.  
- App mobile nativo — inicialmente web responsivo.  
- Login com redes sociais.

## 5. Principais Funcionalidades / Épicos
1. **Administração da Barbearia:** cadastro, horário de funcionamento, informações de contato.  
2. **Gestão de Profissionais:** cadastro, escala/horários, perfil.  
3. **Catálogo de Serviços:** criação/edição de serviços (nome, preço, duração, categoria).  
4. **Agenda e Agendamentos:** visualização por dia/profissional, criação/edição/remoção e bloqueio de horários.  
5. **Histórico de Atendimentos:** criar, listar, editar e excluir comentários com timestamp.  
6. **Avaliações e Feedbacks:** clientes avaliam atendimentos e deixam comentários.  

## 6. Riscos
- Baixa adoção por resistência ao abandono do processo em papel.

## 7. Prioridades Iniciais 
1. Registro e consulta de histórico com validação de comentário obrigatório.

