-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Set-2017 às 02:25
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fonteluz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nu_cpf` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_nascimento` date NOT NULL,
  `logradouro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nu_cep` int(8) DEFAULT NULL,
  `no_cidade_pais` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vl_contribuicao` double DEFAULT NULL,
  `dt_cadastro_perfil` timestamp(6) NULL DEFAULT NULL,
  `co_cidade` int(11) DEFAULT NULL,
  `co_foto` int(11) DEFAULT NULL,
  `naturalidade` int(11) DEFAULT NULL,
  `co_pais` int(11) DEFAULT NULL,
  `co_perfil` int(11) DEFAULT NULL,
  `co_uf` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `no_nome`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `nu_cpf`, `dt_nascimento`, `logradouro`, `bairro`, `nu_cep`, `no_cidade_pais`, `vl_contribuicao`, `dt_cadastro_perfil`, `co_cidade`, `co_foto`, `naturalidade`, `co_pais`, `co_perfil`, `co_uf`) VALUES
(2, 'lucas', 'lucas@ig.com', '$2y$10$g0Ns06if4.Xf9h9zTSW4m./4tj5jVX1hfs9THvdY01jfkHa1cWU16', 'reRM8VkVaLX8cfK3SPhBHiqmXwojLi1wYBvjtRruBvawtuA3MS8d0PvpNrts', '2017-09-07 22:27:54', '2017-09-07 22:27:54', '04788897121', '2017-09-07', 'qe', 'guar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
