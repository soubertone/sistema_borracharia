-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 04-Nov-2019 às 12:42
-- Versão do servidor: 10.2.27-MariaDB
-- versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shangr71_shangrila`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod` int(11) NOT NULL,
  `nome` varchar(200) COLLATE latin1_bin NOT NULL,
  `rg` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `cidade` varchar(100) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL,
  `telefone` int(11) NOT NULL,
  `endereco` varchar(200) COLLATE latin1_bin NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clogin`
--

CREATE TABLE `clogin` (
  `cod` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE latin1_bin NOT NULL,
  `pass` varchar(100) COLLATE latin1_bin NOT NULL,
  `priv` text COLLATE latin1_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cponto`
--

CREATE TABLE `cponto` (
  `codponto` int(11) NOT NULL,
  `codfuncionario` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `tipo` varchar(100) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fechacaixa`
--

CREATE TABLE `fechacaixa` (
  `cod` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `valortotal` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `fechacaixa`
--

INSERT INTO `fechacaixa` (`cod`, `data`, `hora`, `valortotal`) VALUES
(7, '2019-10-28', '21:03:00', 4.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cod` int(11) NOT NULL,
  `nome` varchar(200) COLLATE latin1_bin NOT NULL,
  `rg` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `endereco` varchar(200) COLLATE latin1_bin NOT NULL,
  `numero` int(11) NOT NULL,
  `email` varchar(200) COLLATE latin1_bin NOT NULL,
  `sexo` char(2) COLLATE latin1_bin NOT NULL,
  `periodo` varchar(50) COLLATE latin1_bin NOT NULL,
  `datadenasc` date NOT NULL,
  `datadecontrato` date NOT NULL,
  `usuario` varchar(100) COLLATE latin1_bin NOT NULL,
  `pass` varchar(100) COLLATE latin1_bin NOT NULL,
  `priv` varchar(100) COLLATE latin1_bin NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cod`, `nome`, `rg`, `cpf`, `telefone`, `endereco`, `numero`, `email`, `sexo`, `periodo`, `datadenasc`, `datadecontrato`, `usuario`, `pass`, `priv`) VALUES
(1, 'Marcelo Alves', 123456789, 1656565473, 99996548, 'Rua Silva de Souza', 123, 'bertone@hotmail.com', 'M', 'Tarde', '1974-08-16', '2019-01-08', 'usuario', '123', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_insumo`
--

CREATE TABLE `produto_insumo` (
  `cod` int(11) NOT NULL,
  `datachegada` date NOT NULL,
  `descricao` varchar(200) COLLATE latin1_bin NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorunit` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_pneu`
--

CREATE TABLE `produto_pneu` (
  `cod` int(11) NOT NULL,
  `datachegada` date NOT NULL,
  `veiculo` varchar(200) COLLATE latin1_bin NOT NULL,
  `aro` int(11) NOT NULL,
  `tamanho` int(11) NOT NULL,
  `marca` varchar(200) COLLATE latin1_bin NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorunit` decimal(9,2) NOT NULL,
  `tipo` varchar(100) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regservico`
--

CREATE TABLE `regservico` (
  `cod` int(11) NOT NULL,
  `codfuncionario` int(11) NOT NULL,
  `descricao` varchar(100) COLLATE latin1_bin NOT NULL,
  `tipo` varchar(100) COLLATE latin1_bin NOT NULL,
  `data` date NOT NULL,
  `valorunit` decimal(9,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `desconto` decimal(9,2) NOT NULL,
  `valortotal` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_final`
--

CREATE TABLE `venda_final` (
  `cod` int(11) NOT NULL,
  `data` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `codvenda_insumo` int(11) NOT NULL,
  `codvenda_pneu` int(11) NOT NULL,
  `codfuncionario` int(11) NOT NULL,
  `codcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_insumo`
--

CREATE TABLE `venda_insumo` (
  `cod` int(11) NOT NULL,
  `data` date NOT NULL,
  `codproduto_insumo` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorunit` decimal(9,2) NOT NULL,
  `codcliente` int(11) NOT NULL,
  `codfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_pneu`
--

CREATE TABLE `venda_pneu` (
  `cod` int(11) NOT NULL,
  `data` date NOT NULL,
  `codproduto_pneu` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorunit` decimal(9,2) NOT NULL,
  `codcliente` int(11) NOT NULL,
  `codfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `clogin`
--
ALTER TABLE `clogin`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `cponto`
--
ALTER TABLE `cponto`
  ADD PRIMARY KEY (`codponto`);

--
-- Indexes for table `fechacaixa`
--
ALTER TABLE `fechacaixa`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `produto_insumo`
--
ALTER TABLE `produto_insumo`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `produto_pneu`
--
ALTER TABLE `produto_pneu`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `regservico`
--
ALTER TABLE `regservico`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `codfuncionario3` (`codfuncionario`);

--
-- Indexes for table `venda_final`
--
ALTER TABLE `venda_final`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `venda_insumo`
--
ALTER TABLE `venda_insumo`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `codprodutoinsumo1` (`codproduto_insumo`),
  ADD KEY `codcliente2` (`codcliente`),
  ADD KEY `codfuncionario2` (`codfuncionario`);

--
-- Indexes for table `venda_pneu`
--
ALTER TABLE `venda_pneu`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `codprodutopneu1` (`codproduto_pneu`),
  ADD KEY `codcliente1` (`codcliente`),
  ADD KEY `codfuncionario1` (`codfuncionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clogin`
--
ALTER TABLE `clogin`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cponto`
--
ALTER TABLE `cponto`
  MODIFY `codponto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fechacaixa`
--
ALTER TABLE `fechacaixa`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produto_insumo`
--
ALTER TABLE `produto_insumo`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto_pneu`
--
ALTER TABLE `produto_pneu`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regservico`
--
ALTER TABLE `regservico`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `venda_final`
--
ALTER TABLE `venda_final`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venda_insumo`
--
ALTER TABLE `venda_insumo`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venda_pneu`
--
ALTER TABLE `venda_pneu`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `regservico`
--
ALTER TABLE `regservico`
  ADD CONSTRAINT `codfuncionario3` FOREIGN KEY (`codfuncionario`) REFERENCES `funcionario` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `venda_insumo`
--
ALTER TABLE `venda_insumo`
  ADD CONSTRAINT `codcliente2` FOREIGN KEY (`codcliente`) REFERENCES `cliente` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codfuncionario2` FOREIGN KEY (`codfuncionario`) REFERENCES `funcionario` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codprodutoinsumo1` FOREIGN KEY (`codproduto_insumo`) REFERENCES `produto_insumo` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `venda_pneu`
--
ALTER TABLE `venda_pneu`
  ADD CONSTRAINT `codcliente1` FOREIGN KEY (`codcliente`) REFERENCES `cliente` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codfuncionario1` FOREIGN KEY (`codfuncionario`) REFERENCES `funcionario` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codprodutopneu1` FOREIGN KEY (`codproduto_pneu`) REFERENCES `produto_pneu` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
