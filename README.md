# crud-php-8-pdo
CRUD simples em PHP 8 com a biblioteca PDO. 

###### Instalação do Banco de Dados
################ Rode o seguinte comando SQL 

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `salario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cargo`, `salario`) VALUES
(6, 'Nena Garibalde', 'nena.gari@gmail.com', 'Aux. Adm', 1970.55),
(7, 'Lucas Almeida', 'lucasvinni94@gmail.com', 'CEO', 0),
(8, 'Aparecida Bustamante', 'aparecida.empresarial@empresa.com.br', 'Auxiliar Administrativa', 1500.5);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

