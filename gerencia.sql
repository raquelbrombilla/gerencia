-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Fev-2021 às 14:58
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerencia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `automotor`
--

CREATE TABLE `automotor` (
  `id_automotor` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `ano` date NOT NULL,
  `renavam` varchar(20) NOT NULL,
  `chassi` varchar(50) NOT NULL,
  `antt` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_cad_usuario` int(11) NOT NULL,
  `id_dirige_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carreta`
--

CREATE TABLE `carreta` (
  `id_carreta` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `ano` date NOT NULL,
  `antt` varchar(20) NOT NULL,
  `chassi` varchar(150) NOT NULL,
  `renavam` varchar(20) NOT NULL,
  `id_cad_usuario` int(11) NOT NULL,
  `id_automotor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id_despesa` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `estabelecimento` varchar(40) NOT NULL,
  `data` date NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `id_viagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `diesel`
--

CREATE TABLE `diesel` (
  `id_diesel` int(11) NOT NULL,
  `posto` varchar(30) NOT NULL,
  `data` date NOT NULL,
  `km` decimal(10,0) NOT NULL,
  `litros` decimal(10,0) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `id_viagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cnh` varchar(11) DEFAULT NULL,
  `dt_admissao` date DEFAULT NULL,
  `senha` varchar(50) NOT NULL,
  `dt_nasc` date DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `possui_id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagem`
--

CREATE TABLE `viagem` (
  `id_viagem` int(11) NOT NULL,
  `dt_carregamento` date NOT NULL,
  `local_carregamento` varchar(40) NOT NULL,
  `km_saida` decimal(10,0) NOT NULL,
  `destino` varchar(40) NOT NULL,
  `dt_descarregamento` date DEFAULT NULL,
  `km_chegada` decimal(10,0) DEFAULT NULL,
  `valor_frete` decimal(10,0) DEFAULT NULL,
  `concluida` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `automotor`
--
ALTER TABLE `automotor`
  ADD PRIMARY KEY (`id_automotor`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD KEY `id_cad_usuario` (`id_cad_usuario`),
  ADD KEY `id_dirige_usuario` (`id_dirige_usuario`);

--
-- Índices para tabela `carreta`
--
ALTER TABLE `carreta`
  ADD PRIMARY KEY (`id_carreta`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD UNIQUE KEY `chassi` (`chassi`),
  ADD KEY `id_caminhao` (`id_automotor`),
  ADD KEY `renavam` (`renavam`);

--
-- Índices para tabela `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id_despesa`),
  ADD KEY `id_viagem` (`id_viagem`);

--
-- Índices para tabela `diesel`
--
ALTER TABLE `diesel`
  ADD PRIMARY KEY (`id_diesel`),
  ADD KEY `id_viagem` (`id_viagem`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `possui_id_usuario` (`possui_id_usuario`);

--
-- Índices para tabela `viagem`
--
ALTER TABLE `viagem`
  ADD PRIMARY KEY (`id_viagem`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `automotor`
--
ALTER TABLE `automotor`
  MODIFY `id_automotor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `carreta`
--
ALTER TABLE `carreta`
  MODIFY `id_carreta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id_despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `diesel`
--
ALTER TABLE `diesel`
  MODIFY `id_diesel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `viagem`
--
ALTER TABLE `viagem`
  MODIFY `id_viagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `automotor`
--
ALTER TABLE `automotor`
  ADD CONSTRAINT `automotor_ibfk_1` FOREIGN KEY (`id_cad_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `automotor_ibfk_2` FOREIGN KEY (`id_dirige_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `carreta`
--
ALTER TABLE `carreta`
  ADD CONSTRAINT `carreta_ibfk_1` FOREIGN KEY (`id_automotor`) REFERENCES `automotor` (`id_automotor`);

--
-- Limitadores para a tabela `despesas`
--
ALTER TABLE `despesas`
  ADD CONSTRAINT `despesas_ibfk_1` FOREIGN KEY (`id_viagem`) REFERENCES `viagem` (`id_viagem`);

--
-- Limitadores para a tabela `diesel`
--
ALTER TABLE `diesel`
  ADD CONSTRAINT `diesel_ibfk_1` FOREIGN KEY (`id_viagem`) REFERENCES `viagem` (`id_viagem`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`possui_id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `viagem`
--
ALTER TABLE `viagem`
  ADD CONSTRAINT `viagem_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
