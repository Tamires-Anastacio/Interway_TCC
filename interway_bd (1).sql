-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Out-2026 às 17:13
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `interway_bd`
--
CREATE DATABASE IF NOT EXISTS `interway_bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `interway_bd`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anotacoes_planejamento`
--

CREATE TABLE `anotacoes_planejamento` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `categoria` enum('visto','financas','bagagem','acomodacao','outros') NOT NULL,
  `prioridade` enum('alta','media','baixa') DEFAULT 'media',
  `conteudo` text NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anotacoes_planejamento`
--

INSERT INTO `anotacoes_planejamento` (`id`, `usuario_id`, `titulo`, `categoria`, `prioridade`, `conteudo`, `data_criacao`) VALUES
(1, 1, 'Agendamento no Consulado', 'visto', 'alta', 'Separar extratos dos últimos 3 meses e carta de aceitação oficial.', '2026-09-23 19:03:48'),
(2, 1, 'Pesquisa de Passagens', 'financas', 'media', 'Monitorar voos para Toronto com escala nos EUA ou voo direto.', '2026-09-23 19:03:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `assinaturas`
--

CREATE TABLE `assinaturas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `plano_id` int(11) NOT NULL,
  `status` enum('pendente','ativa','cancelada','expirada') DEFAULT 'pendente',
  `data_inicio` datetime DEFAULT NULL,
  `data_fim` datetime DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bolsas`
--

CREATE TABLE `bolsas` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `universidade` varchar(200) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `nivel` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `requisitos` text NOT NULL,
  `prazo` varchar(100) NOT NULL,
  `link_edital` varchar(500) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bolsas`
--

INSERT INTO `bolsas` (`id`, `nome`, `universidade`, `pais`, `nivel`, `tipo`, `valor`, `descricao`, `requisitos`, `prazo`, `link_edital`, `data_cadastro`) VALUES
(1, 'Lester B. Pearson International Scholarship', 'Universidade de Toronto', 'Canadá', 'Graduação', 'integral', '100% de isenção + Moradia + Livros + Custo de Vida', 'Bolsa para estudantes internacionais com excelente desempenho acadêmico e impacto social.', 'Destaque acadêmico, liderança comunitária, indicação da escola e proficiência em inglês.', 'Novembro / Anual', 'https://future.utoronto.ca/pearson/', '2026-10-07 15:06:14'),
(2, 'Chevening Scholarships', 'Universidades do Reino Unido', 'Reino Unido', 'Mestrado', 'integral', 'Mensalidade + Passagem + Auxílio de subsistência', 'Programa de bolsas do governo britânico para estudantes internacionais.', 'Diploma de graduação, experiência profissional e perfil de liderança.', 'Outubro / Novembro', 'https://www.chevening.org/', '2026-10-07 15:06:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bolsas_estudo`
--

CREATE TABLE `bolsas_estudo` (
  `id` int(11) NOT NULL,
  `nome_bolsa` varchar(150) NOT NULL,
  `universidade` varchar(150) NOT NULL,
  `pais` varchar(60) NOT NULL,
  `nivel` varchar(80) NOT NULL,
  `tipo_cobertura` enum('integral','parcial') NOT NULL,
  `descricao` text NOT NULL,
  `valor_cobertura` text NOT NULL,
  `requisitos` text NOT NULL,
  `prazo_inscricao` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_comunidade`
--

CREATE TABLE `chat_comunidade` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `papel_usuario` enum('futuro','veterano') NOT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_ia_historico`
--

CREATE TABLE `chat_ia_historico` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `pergunta_usuario` text NOT NULL,
  `resposta_ia` text NOT NULL,
  `data_interacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `checklist_planejamento`
--

CREATE TABLE `checklist_planejamento` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `item_nome` varchar(150) NOT NULL,
  `concluido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mensagem` text NOT NULL,
  `status` enum('pendente','respondido') DEFAULT 'pendente',
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `destinos`
--

CREATE TABLE `destinos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `bandeira` varchar(10) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `destinos`
--

INSERT INTO `destinos` (`id`, `nome`, `pais`, `bandeira`, `ativo`) VALUES
(1, 'Toronto', 'Canadá', '🇨🇦', 1),
(2, 'Dublin', 'Irlanda', '🇮🇪', 1),
(3, 'Londres', 'Reino Unido', '🇬🇧', 1),
(4, 'Sydney', 'Austrália', '🇦🇺', 1),
(5, 'Nova York', 'Estados Unidos', '🇺🇸', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas`
--

CREATE TABLE `escolas` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `pais` varchar(80) NOT NULL,
  `pais_nome` varchar(80) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `bandeira` varchar(10) DEFAULT NULL,
  `imagem` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `descricao_completa` text DEFAULT NULL,
  `cursos` text DEFAULT NULL,
  `acomodacao` text DEFAULT NULL,
  `trabalho` text DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas_parceiras`
--

CREATE TABLE `escolas_parceiras` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `pais` varchar(60) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `cursos_ofertados` text NOT NULL,
  `acomodacao_info` varchar(255) NOT NULL,
  `permissao_trabalho` varchar(255) NOT NULL,
  `credenciamento` varchar(150) NOT NULL,
  `foto_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `escolas_parceiras`
--

INSERT INTO `escolas_parceiras` (`id`, `nome`, `pais`, `cidade`, `descricao`, `cursos_ofertados`, `acomodacao_info`, `permissao_trabalho`, `credenciamento`, `foto_url`) VALUES
(1, 'ILAC Academy', 'Canadá', 'Toronto & Vancouver', 'Escola premiada com infraestrutura moderna.', 'Inglês Geral, Pathway Universitário', 'Homestay e Residência', 'College Co-op', 'Languages Canada', 'https://images.unsplash.com/photo-1517935703635-27190760b798'),
(2, 'Atlas Language School', 'Irlanda', 'Dublin', 'Referência para quem deseja conciliar estudo e trabalho.', 'General English, Preparatório Cambridge', 'Residência Estudantil', '20h semanais (Stamp 2)', 'EAQUALS / MEI', 'https://images.unsplash.com/photo-1549918864-48ac978761a4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola_recursos`
--

CREATE TABLE `escola_recursos` (
  `id` int(11) NOT NULL,
  `escola_id` int(11) NOT NULL,
  `recurso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `nome`, `email`, `mensagem`, `data_envio`) VALUES
(1, 'Yigona', 'tamiresanastaciodefreitas283@gmail.com', 'tudo numa boa', '2026-10-07 14:53:12'),
(6, 'Luís', 'luis8234@gmail.com', 'Isso já aconteceu comigo também gente', '2026-10-07 14:59:37'),
(7, 'Lina', 'lina.goncalves834@gmail.com', 'Quero saber sobre intercâmbios', '2026-10-08 13:57:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `destino` varchar(100) NOT NULL,
  `duracao` int(11) NOT NULL,
  `hospedagem` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `passagem` varchar(50) NOT NULL,
  `seguro` varchar(50) NOT NULL,
  `transfer` varchar(10) NOT NULL,
  `valor_hospedagem` decimal(10,2) NOT NULL,
  `valor_curso` decimal(10,2) NOT NULL,
  `valor_passagem` decimal(10,2) NOT NULL,
  `valor_seguro` decimal(10,2) NOT NULL,
  `valor_transfer` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `assinatura_id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `status` enum('pendente','aprovado','recusado','cancelado') DEFAULT 'pendente',
  `metodo` varchar(50) DEFAULT NULL,
  `codigo_transacao` varchar(150) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises_seguros`
--

CREATE TABLE `paises_seguros` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `continente` varchar(50) NOT NULL,
  `indice_seguranca` varchar(100) NOT NULL,
  `regras_trabalho` varchar(150) NOT NULL,
  `idioma_principal` varchar(80) NOT NULL,
  `telefones_emergencia` varchar(100) NOT NULL,
  `dicas_seguranca` text NOT NULL,
  `foto_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paises_seguros`
--

INSERT INTO `paises_seguros` (`id`, `nome`, `continente`, `indice_seguranca`, `regras_trabalho`, `idioma_principal`, `telefones_emergencia`, `dicas_seguranca`, `foto_url`) VALUES
(1, 'Irlanda', 'Europa', 'Top 3 Global Peace Index', '20h semanais durante as aulas', 'Inglês', '112 ou 999', 'Comunidade muito receptiva e policiamento próximo.', 'https://images.unsplash.com/photo-1549918864-48ac978761a4'),
(2, 'Canadá', 'América do Norte', 'Top 11 no Mundo', 'Permitido em cursos vocacionais/College', 'Inglês e Francês', '911', 'Infraestrutura de primeiro mundo e cidades planejadas.', 'https://images.unsplash.com/photo-1517935703635-27190760b798');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `periodicidade` varchar(20) DEFAULT 'mensal',
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id`, `nome`, `descricao`, `preco`, `periodicidade`, `ativo`) VALUES
(1, 'Explorador', 'Plano gratuito para começar a conhecer o InterWay.', '0.00', 'mensal', 1),
(2, 'InterWay Plus', 'Plano com recursos adicionais para planejamento do intercâmbio.', '19.90', 'mensal', 1),
(3, 'InterWay Premium', 'Plano completo com recursos exclusivos.', '39.90', 'mensal', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_blog`
--

CREATE TABLE `posts_blog` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `legenda` text NOT NULL,
  `foto_url` varchar(255) NOT NULL,
  `reacoes_amei` int(11) DEFAULT 0,
  `reacoes_quero_ir` int(11) DEFAULT 0,
  `reacoes_inspirador` int(11) DEFAULT 0,
  `data_postagem` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes`
--

CREATE TABLE `publicacoes` (
  `id` int(11) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `destino` varchar(150) NOT NULL,
  `legenda` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `data_publicacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `publicacoes`
--

INSERT INTO `publicacoes` (`id`, `autor`, `destino`, `legenda`, `foto`, `data_publicacao`) VALUES
(1, 'Lorena', 'Bangladesh', 'Eu comi vários morcegos. A culinária é muito rica em proteínas. A paisagem é muito bela também.', 'uploads/foto_6ac656c8176480.74338658.jpg', '2026-10-07 14:27:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultados_quiz`
--

CREATE TABLE `resultados_quiz` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `clima` varchar(50) NOT NULL,
  `objetivo` varchar(100) NOT NULL,
  `idioma` varchar(100) NOT NULL,
  `experiencia` varchar(100) NOT NULL,
  `orcamento` varchar(50) NOT NULL,
  `pais_recomendado` varchar(100) NOT NULL,
  `data_resultado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `resultados_quiz`
--

INSERT INTO `resultados_quiz` (`id`, `nome`, `clima`, `objetivo`, `idioma`, `experiencia`, `orcamento`, `pais_recomendado`, `data_resultado`) VALUES
(1, NULL, 'ameno', 'trabalhar', 'ingles', 'aventura', 'medio', 'Irlanda', '2026-10-07 14:44:10'),
(2, NULL, 'quente', 'turismo', 'quero-aprender', 'aventura', 'medio', 'Austrália', '2026-10-07 14:44:21'),
(3, NULL, 'frio', 'turismo', 'ingles', 'academica', 'baixo', 'Canadá', '2026-10-07 14:45:14'),
(4, NULL, 'quente', 'trabalhar', 'quero-aprender', 'aventura', 'baixo', 'Austrália', '2026-10-08 14:51:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos_orcamento`
--

CREATE TABLE `servicos_orcamento` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('futuro','veterano','admin') DEFAULT 'futuro',
  `destino_interesse` varchar(100) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT 'default_avatar.png',
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`, `destino_interesse`, `foto_perfil`, `data_cadastro`) VALUES
(1, 'Sophia Gonçalves', 'sophia@etec.sp.gov.br', '123456', 'futuro', 'Canadá', 'default_avatar.png', '2026-09-23 19:03:47'),
(2, 'Gabriel Souza', 'gabriel@etec.sp.gov.br', '123456', 'veterano', 'Irlanda', 'default_avatar.png', '2026-09-23 19:03:47'),
(3, 'Lucas Pedroso', 'lucas@etec.sp.gov.br', '123456', 'veterano', 'Canadá', 'default_avatar.png', '2026-09-23 19:03:47'),
(4, 'Lorrayne', 'tamiresanastaciodefreitas283@gmail.com', '$2y$10$0IFcXGlExE0xfv2217C/le72U2bLl02et2hLeX7.p.DaV8FkNmyg2', 'futuro', NULL, 'default_avatar.png', '2026-10-07 15:24:50'),
(5, 'Tamires Anastacio de Freitas', 'tamiresanastacio734@gmail.com', '$2y$10$J6RJEyrhOx8Zf9FYQu094OQ8Fd3vdElLHUp8cMH8BquGlZtQQsVq.', 'futuro', NULL, 'default_avatar.png', '2026-10-08 14:02:08');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anotacoes_planejamento`
--
ALTER TABLE `anotacoes_planejamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `assinaturas`
--
ALTER TABLE `assinaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `plano_id` (`plano_id`);

--
-- Índices para tabela `bolsas`
--
ALTER TABLE `bolsas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `bolsas_estudo`
--
ALTER TABLE `bolsas_estudo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chat_comunidade`
--
ALTER TABLE `chat_comunidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `chat_ia_historico`
--
ALTER TABLE `chat_ia_historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `checklist_planejamento`
--
ALTER TABLE `checklist_planejamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `escolas`
--
ALTER TABLE `escolas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `escolas_parceiras`
--
ALTER TABLE `escolas_parceiras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `escola_recursos`
--
ALTER TABLE `escola_recursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escola_id` (`escola_id`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Índices para tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `assinatura_id` (`assinatura_id`);

--
-- Índices para tabela `paises_seguros`
--
ALTER TABLE `paises_seguros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts_blog`
--
ALTER TABLE `posts_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `resultados_quiz`
--
ALTER TABLE `resultados_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servicos_orcamento`
--
ALTER TABLE `servicos_orcamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anotacoes_planejamento`
--
ALTER TABLE `anotacoes_planejamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `assinaturas`
--
ALTER TABLE `assinaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `bolsas`
--
ALTER TABLE `bolsas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `bolsas_estudo`
--
ALTER TABLE `bolsas_estudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `chat_comunidade`
--
ALTER TABLE `chat_comunidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `chat_ia_historico`
--
ALTER TABLE `chat_ia_historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `checklist_planejamento`
--
ALTER TABLE `checklist_planejamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `escolas`
--
ALTER TABLE `escolas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `escolas_parceiras`
--
ALTER TABLE `escolas_parceiras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `escola_recursos`
--
ALTER TABLE `escola_recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `paises_seguros`
--
ALTER TABLE `paises_seguros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `posts_blog`
--
ALTER TABLE `posts_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `resultados_quiz`
--
ALTER TABLE `resultados_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `servicos_orcamento`
--
ALTER TABLE `servicos_orcamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anotacoes_planejamento`
--
ALTER TABLE `anotacoes_planejamento`
  ADD CONSTRAINT `anotacoes_planejamento_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `assinaturas`
--
ALTER TABLE `assinaturas`
  ADD CONSTRAINT `assinaturas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assinaturas_ibfk_2` FOREIGN KEY (`plano_id`) REFERENCES `planos` (`id`);

--
-- Limitadores para a tabela `chat_comunidade`
--
ALTER TABLE `chat_comunidade`
  ADD CONSTRAINT `chat_comunidade_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `chat_ia_historico`
--
ALTER TABLE `chat_ia_historico`
  ADD CONSTRAINT `chat_ia_historico_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `checklist_planejamento`
--
ALTER TABLE `checklist_planejamento`
  ADD CONSTRAINT `checklist_planejamento_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `escola_recursos`
--
ALTER TABLE `escola_recursos`
  ADD CONSTRAINT `escola_recursos_ibfk_1` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pagamentos_ibfk_2` FOREIGN KEY (`assinatura_id`) REFERENCES `assinaturas` (`id`);

--
-- Limitadores para a tabela `posts_blog`
--
ALTER TABLE `posts_blog`
  ADD CONSTRAINT `posts_blog_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
