# Definição de Padrões e Processo de Desenvolvimento de Software #

## Processo

**Papeis**

- [Analista de Negócio](papeis.md#analista-de-negocio): Responsável por compreender as necessidades do dono da barbearia e dos clientes, traduzindo-as em funcionalidades que agregam valor.
- [Analista de Requisitos](papeis.md#analista-de-requisitos): Responsável por documentar e detalhar as necessidades da barbearia, transformando-as em requisitos claros e organizados.
- [Desenvolvedor](papeis.md#desenvolvedor): Responsável por construir e implementar o sistema, transformando os requisitos em funcionalidades práticas.

**Atividades**
- [Analisar Negócio](atividades.md#1-analisar-negócio): Identificar e compreender as necessidades da barbearia e de seus clientes, definindo as funcionalidades essenciais do sistema e gerando o documento de visão e escopo do projeto.
- [Especificar](atividades.md#2-especificar-funcionalidades): Documentar os requisitos funcionais e não funcionais do sistema, especificando funcionalidades com base no documento de visão.
- [Codificar](atividades.md#3-codificar): Implementar as funcionalidades do sistema com base nos requisitos especificados, garantindo que o código seja funcional.

**Artefatos**
- [Documento de Visão](artefatos.md#1-documento-de-visao): Artefato responsável por descrever de forma geral o sistema, seus objetivos, público-alvo e funcionalidades principais, alinhando expectativas entre o cliente e a equipe.
- [Especificação de Funcionalidade](artefatos.md#2-especificacao-de-funcionalidade): Documento que detalha os requisitos funcionais do sistema, descrevendo como cada funcionalidade deve se comportar.
- [Produto](artefatos.md#3-produto): Artefato resultante da codificação, que representa aquilo que atende aos requisitos especificados e está disponível para uso pelos usuários.

## Padrões Estabelecidos para o Desenvolvimento

**Padrão de Diretórios** - Artefatos só podem ser criados dentro dessa estrutura estabelecida.
- [Requisitos](requisitos/): Artefatos que detalham as funcionalidades funcionais e não funcionais do sistema, incluindo diagramas de casos de uso e a especificação de funcionalidades.
- [Código Fonte](codificacao/): Artefatos relacionados à codificação do sistema, ou seja, o produto final e suas funcionalidades implementadas.

**Padrão para criar os Artefatos de Requisitos** - Cada artefato de requisitos deve representar uma funcionalidade específica, seguir o padrão de nomenclatura definido pelo ambiente e ser organizado em uma estrutura de diretórios com nomes significativos dentro do diretório padrão de [Requisitos](requisitos/).

- A estrutura de diretórios que armazenará os artefatos de requisitos criados e mantidos no diretório [Requisitos](requisitos/) deverá seguir a seguinte classificação primária: os artefatos relacionados às necessidades do domínio do problema, como as funcionalidades do sistema da barbearia, deverão ser organizados no diretório [Requisitos Funcionais](requisitos/requisitos-funcionais/) Funcionais; os artefatos que descrevem características de qualidade do produto, como desempenho, segurança e usabilidade, deverão ser organizados no diretório [Requisitos Não-Funcionais](requisitos/requisitos-nao-funcionais/).

- Padrão de Nomenclatura
    - `REQ.` como prefixo para identificar os artefatos de requisitos que irão contextualizar (indexam / contextualizam) especificações de requisitos arquivos que carregam a documentação;
    - Em seguida, dentro do diretório no qual ele será criado, uma identificação numérica de três dígitos (REQ.000) que consiga identificar o artefato de modo único e exclusivo.
    - Por fim, utilizaremos a extensão .md para permitir a utilização da Linguagem de Marcação Markdown com intuito de formatar os artefatos de requisitos, possibilitando criar artefatos organizados e de estrutura fluida. (ex.: REQ.000.md)
