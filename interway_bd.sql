-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/09/2026 às 21:18
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `anotacoes_planejamento`
--

CREATE TABLE `anotacoes_planejamento` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `categoria` enum('visto','financas','bagagem','acomodacao','outros') NOT NULL,
  `prioridade` enum('alta','media','baixa') DEFAULT 'media',
  `conteudo` text NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `anotacoes_planejamento`
--

INSERT INTO `anotacoes_planejamento` (`id`, `usuario_id`, `titulo`, `categoria`, `prioridade`, `conteudo`, `data_criacao`) VALUES
(1, 1, 'Agendamento no Consulado', 'visto', 'alta', 'Separar extratos dos últimos 3 meses e carta de aceitação oficial.', '2026-09-23 19:03:48'),
(2, 1, 'Pesquisa de Passagens', 'financas', 'media', 'Monitorar voos para Toronto com escala nos EUA ou voo direto.', '2026-09-23 19:03:48');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bolsas_estudo`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `bolsas_estudo`
--

INSERT INTO `bolsas_estudo` (`id`, `nome_bolsa`, `universidade`, `pais`, `nivel`, `tipo_cobertura`, `descricao`, `valor_cobertura`, `requisitos`, `prazo_inscricao`) VALUES
(1, 'Lester B. Pearson', 'Universidade de Toronto', 'Canadá', 'Graduação', 'integral', 'Bolsa para alunos de alto rendimento acadêmico e liderança.', '100% isenção + moradia + livros', 'Histórico exemplar, redação e IELTS/TOEFL', 'Novembro'),
(2, 'Chevening Scholarship', 'Universidades do Reino Unido', 'Reino Unido', 'Mestrado', 'integral', 'Programa oficial do governo britânico para líderes globais.', 'Passagem + 100% de mensalidade + estipêndio mensal', 'Graduação completa e 2 anos de experiência', 'Outubro a Novembro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `chat_comunidade`
--

CREATE TABLE `chat_comunidade` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `papel_usuario` enum('futuro','veterano') NOT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `chat_ia_historico`
--

CREATE TABLE `chat_ia_historico` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `pergunta_usuario` text NOT NULL,
  `resposta_ia` text NOT NULL,
  `data_interacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `checklist_planejamento`
--

CREATE TABLE `checklist_planejamento` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `item_nome` varchar(150) NOT NULL,
  `concluido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mensagem` text NOT NULL,
  `status` enum('pendente','respondido') DEFAULT 'pendente',
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `escolas_parceiras`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `escolas_parceiras`
--

INSERT INTO `escolas_parceiras` (`id`, `nome`, `pais`, `cidade`, `descricao`, `cursos_ofertados`, `acomodacao_info`, `permissao_trabalho`, `credenciamento`, `foto_url`) VALUES
(1, 'ILAC Academy', 'Canadá', 'Toronto & Vancouver', 'Escola premiada com infraestrutura moderna.', 'Inglês Geral, Pathway Universitário', 'Homestay e Residência', 'College Co-op', 'Languages Canada', 'https://images.unsplash.com/photo-1517935703635-27190760b798'),
(2, 'Atlas Language School', 'Irlanda', 'Dublin', 'Referência para quem deseja conciliar estudo e trabalho.', 'General English, Preparatório Cambridge', 'Residência Estudantil', '20h semanais (Stamp 2)', 'EAQUALS / MEI', 'https://images.unsplash.com/photo-1549918864-48ac978761a4');

-- --------------------------------------------------------

--
-- Estrutura para tabela `paises_seguros`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paises_seguros`
--

INSERT INTO `paises_seguros` (`id`, `nome`, `continente`, `indice_seguranca`, `regras_trabalho`, `idioma_principal`, `telefones_emergencia`, `dicas_seguranca`, `foto_url`) VALUES
(1, 'Irlanda', 'Europa', 'Top 3 Global Peace Index', '20h semanais durante as aulas', 'Inglês', '112 ou 999', 'Comunidade muito receptiva e policiamento próximo.', 'https://images.unsplash.com/photo-1549918864-48ac978761a4'),
(2, 'Canadá', 'América do Norte', 'Top 11 no Mundo', 'Permitido em cursos vocacionais/College', 'Inglês e Francês', '911', 'Infraestrutura de primeiro mundo e cidades planejadas.', 'https://images.unsplash.com/photo-1517935703635-27190760b798');

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts_blog`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`, `destino_interesse`, `foto_perfil`, `data_cadastro`) VALUES
(1, 'Sophia Gonçalves', 'sophia@etec.sp.gov.br', '123456', 'futuro', 'Canadá', 'default_avatar.png', '2026-09-23 19:03:47'),
(2, 'Gabriel Souza', 'gabriel@etec.sp.gov.br', '123456', 'veterano', 'Irlanda', 'default_avatar.png', '2026-09-23 19:03:47'),
(3, 'Lucas Pedroso', 'lucas@etec.sp.gov.br', '123456', 'veterano', 'Canadá', 'default_avatar.png', '2026-09-23 19:03:47');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `anotacoes_planejamento`
--
ALTER TABLE `anotacoes_planejamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `bolsas_estudo`
--
ALTER TABLE `bolsas_estudo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `chat_comunidade`
--
ALTER TABLE `chat_comunidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `chat_ia_historico`
--
ALTER TABLE `chat_ia_historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `checklist_planejamento`
--
ALTER TABLE `checklist_planejamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `escolas_parceiras`
--
ALTER TABLE `escolas_parceiras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `paises_seguros`
--
ALTER TABLE `paises_seguros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `posts_blog`
--
ALTER TABLE `posts_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anotacoes_planejamento`
--
ALTER TABLE `anotacoes_planejamento`
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
-- AUTO_INCREMENT de tabela `escolas_parceiras`
--
ALTER TABLE `escolas_parceiras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `paises_seguros`
--
ALTER TABLE `paises_seguros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `posts_blog`
--
ALTER TABLE `posts_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `anotacoes_planejamento`
--
ALTER TABLE `anotacoes_planejamento`
  ADD CONSTRAINT `anotacoes_planejamento_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `chat_comunidade`
--
ALTER TABLE `chat_comunidade`
  ADD CONSTRAINT `chat_comunidade_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `chat_ia_historico`
--
ALTER TABLE `chat_ia_historico`
  ADD CONSTRAINT `chat_ia_historico_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Restrições para tabelas `checklist_planejamento`
--
ALTER TABLE `checklist_planejamento`
  ADD CONSTRAINT `checklist_planejamento_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `posts_blog`
--
ALTER TABLE `posts_blog`
  ADD CONSTRAINT `posts_blog_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
