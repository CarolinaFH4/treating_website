-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 22-Jul-2024 às 13:32
-- Versão do servidor: 5.7.24
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `treating`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `benefits`
--

CREATE TABLE `benefits` (
  `idbenefit` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `benefits`
--

INSERT INTO `benefits` (`idbenefit`, `name`, `description`, `image`) VALUES
(1, 'Ossos e articulações', 'Se os ossos fornecem a estrutura, as articulações fornecem a flexibilidade, permitindo o movimento. Comer alimentos ricos em cálcio, vitamina D, vitamina C e selénio vai ajudar a manter os seus ossos e articulações saudáveis.', 'joints.svg'),
(2, 'Coração', 'Cuidar da saúde do coração é uma das condutas essenciais quando o assunto é manter a qualidade de vida e o bom funcionamento do nosso organismo. É importante evitar fatores de risco como o tabagismo, alimentação muito gorda e açucarada, falta de descanso e de exercício físico.', 'heart.svg'),
(3, 'Sistema imunológico', 'A gripe é uma doença infecciosa do aparelho respiratório, altamente contagiosa, causada pelo vírus influenza. Um estilo de vida saudável pode em muito ajudar na prevenção e recuperação de doenças.', 'virus.svg'),
(4, 'Atividade cerebral', '', 'brain.svg'),
(5, 'Flora intestinal', 'Quando falamos de flora intestinal, estamos a falar de um grupo de bactérias vivas que se encontram nos intestinos e que desempenham um papel muito importante no metabolismo de nutrientes e na proteção contra agentes patogénicos.', 'intestine.svg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunity`
--

CREATE TABLE `comunity` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `link_title` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `quote` text NOT NULL,
  `image` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comunity`
--

INSERT INTO `comunity` (`id`, `name`, `link_title`, `link`, `quote`, `image`) VALUES
(1, 'Maria Melo Falcão', 'https://www.mariamelofalcao.com/', 'https://www.mariamelofalcao.com/', '“Todos os dias são uma nova oportunidade para me mexer mais e melhor, alimentar-me do que me nutre...”', 'mariafalcao.jpg|mariafalcao2.jpg'),
(2, 'Sofia Paixão', 'https://glutenfree.pt/', 'https://glutenfree.pt/', '“O maior desafio é passar da teoria à prática mas acredito que a melhor forma de o fazer é ir introduzindo novos hábitos, novas texturas e novos sabores.”', 'sofiapaixao.jpg|sofiapaixao2.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `food`
--

CREATE TABLE `food` (
  `idfood` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `food`
--

INSERT INTO `food` (`idfood`, `name`, `category`, `image`) VALUES
(1, 'Espinafre', 'Hortícolas', 'espinafres.jpg'),
(2, 'Leite magro', 'Lacticínios', 'leite_de_vaca.jpg'),
(3, 'Salmão', 'Carnes, pescado e ovos', 'salmao.jpg'),
(4, 'Amêndoas', 'Leguminosas', 'amendoa.jpg'),
(5, 'Alho', 'Hortícolas', 'alho.jpg'),
(6, 'Laranja', 'Fruta', 'laranja.jpg'),
(7, 'Abacate', 'Fruta', 'abacate.jpg'),
(8, 'Noz', 'Leguminosas', 'noz.jpg'),
(9, 'Banana', 'Fruta', 'bananas.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `food_benefit`
--

CREATE TABLE `food_benefit` (
  `id` int(11) NOT NULL,
  `idfood` int(11) NOT NULL,
  `idbenefit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `food_benefit`
--

INSERT INTO `food_benefit` (`id`, `idfood`, `idbenefit`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 5),
(4, 2, 1),
(5, 2, 3),
(6, 3, 2),
(7, 3, 3),
(8, 3, 4),
(9, 4, 1),
(10, 4, 4),
(11, 4, 5),
(12, 5, 3),
(13, 5, 2),
(14, 5, 5),
(15, 5, 4),
(16, 6, 5),
(17, 6, 3),
(18, 6, 2),
(19, 6, 1),
(20, 7, 2),
(21, 7, 4),
(22, 7, 5),
(23, 8, 2),
(24, 8, 4),
(25, 8, 5),
(26, 8, 3),
(27, 9, 5),
(28, 9, 4),
(29, 9, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `glossary`
--

CREATE TABLE `glossary` (
  `idglossary` int(11) NOT NULL,
  `word` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `glossary`
--

INSERT INTO `glossary` (`idglossary`, `word`, `description`) VALUES
(1, 'kcal', 'A sigla kcal significa quilocaloria, que é uma unidade de medida de energia utilizada para quantificar o valor energético dos alimentos. É comumente utilizada para expressar a quantidade de energia que um alimento fornece ao ser metabolizado pelo organismo.'),
(2, 'Lípidos', 'Mesmo que o termo \"lípidos\" não te diga nada, talvez \"gordura\" te seja mais claro.\r\nEstas moléculas constituídas por ácidos gordos (triglicéridos) fazem parte da família dos macronutrientes, tal como as proteínas e os hidratos de carbono.\r\nOs lípidos encontram-se em todas as nossas células, incluindo no nosso cérebro, que é composto a 70% por estes!\r\nTêm assim um papel central no funcionamento do organismo.'),
(3, 'Hidratos de carbono', 'Os Hidratos de Carbono (HC) são um dos nutrientes fornecidos pelos alimentos tal como as proteínas, as gorduras, as fibras, vitaminas e minerais. Através da digestão, são transformados em glicose que é então absorvida para o sangue sendo o principal fornecedor de energia do nosso organismo.'),
(4, 'Prebiótico', 'Servem de substrato para determinados microrganismos presentes no intestino, favorecendo a multiplicação das bactérias benéficas à digestão e para a saúde.'),
(5, 'Fibra', 'Importante para manter a saúde do intestino e prevenir situações, como prisão de ventre, diabetes e doenças cardiovasculares. Além das fibras, deve-se aumentar a ingestão de água, para hidratar as fibras e lubrificar o intestino, evitando a prisão de ventre.'),
(6, 'Vitamina B12', 'A vitamina B12, ou cobalamina, é um nutriente essencial para a formação das células sanguíneas, prevenindo a anemia megaloblástica. É fundamental para o desenvolvimento e manutenção das funções do sistema nervoso central, e para o metabolismo das proteínas e dos carboidratos dos alimentos, ajudando a manter uma boa disposição física e mental.'),
(7, 'Caroteno', 'Os carotenoides são pigmentos naturalmente encontrados em raízes, folhas, sementes, frutas... Fortalecem o sistema imunológico, ajudam a diminuir o risco do surgimento de alguns tipos de cancro e previnem o envelhecimento precoce, porque têm uma ação antioxidante, anti-inflamatória e fotoprotetora.'),
(8, 'Vitamina B12', 'A vitamina B12, ou cobalamina, é um nutriente essencial para a formação das células sanguíneas, prevenindo a anemia megaloblástica. É fundamental para o desenvolvimento e manutenção das funções do sistema nervoso central, e para o metabolismo das proteínas e dos carboidratos dos alimentos, ajudando a manter uma boa disposição física e mental.'),
(9, 'Ácidos gordos trans', 'Os ácidos gordos trans, além de aumentarem o “mau” colesterol no sangue, reduzem o nível do “bom” colesterol. Estas gorduras encontram-se naturalmente presentes em alguns alimentos como o leite e a carne. Mas resultam, sobretudo, da hidrogenação dos óleos vegetais, processo através do qual se solidificam as gorduras líquidas. Estamos perante as gorduras trans quando, na rotulagem, é referido “gordura hidrogenada”.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `link` text NOT NULL,
  `thumbnail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `library`
--

INSERT INTO `library` (`id`, `title`, `description`, `link`, `thumbnail`) VALUES
(1, 'Porções da roda dos alimentos', 'Plano demonstrativo e intuitivo de quanto deverá ser consumido de cada parte na Roda dos Alimentos..', 'porçoes_roda_dos_alimentos.pdf', 'porçoes_roda_dos_alimentos_img_jpg'),
(2, 'Guia para alimentação adequada', 'Guia concebido pela Associação Portuguesa dos Nutricionistas para uma alimentação equilibrada. Inclui doses recomendadas e hábitos que potencializam a alimentação num todo.', 'alimentaçao_adequada.pdf', 'alimentaçao_adequada_img.jpg'),
(3, 'Vegetarian basics', 'Pequeno livro com as bases essenciais para uma alimentação vegetariana equilibrada (em inglês).', 'vegetarian_starter.pdf', 'vegetarian_starter_img.jpg'),
(4, 'Porções de fruta', 'Porção de fruta diária recomendada especificando o alimento.', 'fruta_porçoes.jpg', 'fruta_porçoes_img.jpg'),
(5, 'Alimentação Inteligente. Coma melhor, poupe mais.', 'Livro para guiar o planeamento de uma alimentação saudável e dos seus custos. Tem em conta a sustentabilidade do meio ambiente e da carteira.', 'coma_melhor_poupe_mais.pdf', 'coma_melhor_poupe_mais_img.jpg'),
(6, 'Meal planner', 'Modelo para planeamento de refeições para uma semana (em inglês).', 'weekly_meal_planner.pdf', 'weekly_meal_planner_img.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nutrition`
--

CREATE TABLE `nutrition` (
  `idnutri` int(11) NOT NULL,
  `idfood` int(11) NOT NULL,
  `parameter` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `value` decimal(6,2) NOT NULL,
  `unity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nutrition`
--

INSERT INTO `nutrition` (`idnutri`, `idfood`, `parameter`, `category`, `value`, `unity`) VALUES
(1, 1, 'Energia', 'Nutrientes', '27.00', 'kcal'),
(2, 1, 'Lípidos', 'Nutrientes', '0.90', 'g'),
(3, 1, 'Ácidos gordos saturados', 'Nutrientes', '0.10', 'g'),
(4, 1, 'Ácidos gordos monoinsaturados', 'Nutrientes', '0.00', 'g'),
(5, 1, 'Ácidos gordos polinsaturados', 'Nutrientes', '0.40', 'g'),
(6, 1, 'Ácido linoleico', 'Nutrientes', '0.10', 'g'),
(7, 1, 'Ácidos gordos trans', 'Nutrientes', '0.00', 'g'),
(8, 1, 'Hidratos de carbono', 'Nutrientes', '0.80', 'g'),
(9, 1, 'Açúcares', 'Nutrientes', '0.70', 'g'),
(10, 1, 'Oligossacáridos', 'Nutrientes', '0.00', 'g'),
(11, 1, 'Amido', 'Nutrientes', '0.10', 'g'),
(12, 1, 'Fibra', 'Nutrientes', '2.60', 'g'),
(13, 1, 'Proteínas', 'Nutrientes', '2.60', 'g'),
(14, 1, 'Sal', 'Nutrientes', '0.40', 'g'),
(15, 1, 'Água ', 'Nutrientes', '91.80', 'g'),
(16, 1, 'Ácidos orgânicos ', 'Nutrientes', '0.00', 'g'),
(17, 1, 'Colesterol ', 'Nutrientes', '0.00', 'mg'),
(18, 1, 'Vitamina A', 'Vitaminas', '550.00', 'µg'),
(19, 1, 'Caroteno', 'Vitaminas', '3300.00', 'µg'),
(20, 1, 'Vitamina D', 'Vitaminas', '0.00', 'µg'),
(21, 1, 'Vitamina E', 'Vitaminas', '1.70', 'mg'),
(22, 1, 'Vitamina B1', 'Vitaminas', '0.70', 'mg'),
(23, 1, 'Vitamina B2', 'Vitaminas', '0.18', 'mg'),
(24, 1, 'Vitamina B3', 'Vitaminas', '0.40', 'mg'),
(25, 1, 'Equivalente a B3', 'Vitaminas', '1.10', 'mg'),
(26, 1, 'Triptofano', 'Vitaminas', '0.70', 'mg'),
(27, 1, 'Vitamina B6', 'Vitaminas', '0.17', 'mg'),
(28, 1, 'Vitamina B12 ', 'Vitaminas', '0.00', 'µg'),
(29, 1, 'Vitamina C', 'Vitaminas', '3.50', 'mg'),
(30, 1, 'Vitamina B9', 'Vitaminas', '150.00', 'µg'),
(31, 1, 'Cinza', 'Minerais', '1.30', 'g'),
(32, 1, 'Sódio', 'Minerais', '170.00', 'mg'),
(33, 1, 'Potássio', 'Minerais', '470.00', 'mg'),
(34, 1, 'Cálcio', 'Minerais', '100.00', 'mg'),
(35, 1, 'Fósforo', 'Minerais', '45.00', 'mg'),
(36, 1, 'Magnésio', 'Minerais', '54.00', 'mg'),
(37, 1, 'Ferro', 'Minerais', '2.40', 'g'),
(38, 1, 'Zinco', 'Minerais', '0.90', 'g'),
(39, 1, 'Selénio', 'Minerais', '0.00', 'µg'),
(40, 1, 'Iodo', 'Minerais', '0.00', 'µg'),
(42, 2, 'Energia', 'Nutrientes', '35.00', 'kcal'),
(43, 2, 'Lípidos', 'Nutrientes', '0.20', 'g'),
(44, 2, 'Ácidos gordos saturados', 'Nutrientes', '0.10', 'g'),
(45, 2, 'Ácidos gordos monoinsaturados', 'Nutrientes', '0.10', 'g'),
(46, 2, 'Ácidos gordos polinsaturados', 'Nutrientes', '0.00', 'g'),
(47, 2, 'Ácido linoleico', 'Nutrientes', '0.00', 'g'),
(48, 2, 'Ácidos gordos trans', 'Nutrientes', '0.00', 'g'),
(49, 2, 'Hidratos de carbono', 'Nutrientes', '4.90', 'g'),
(50, 2, 'Açúcares', 'Nutrientes', '4.90', 'g'),
(51, 2, 'Oligossacáridos', 'Nutrientes', '0.00', 'g'),
(52, 2, 'Amido', 'Nutrientes', '0.00', 'g'),
(53, 2, 'Fibra', 'Nutrientes', '0.00', 'g'),
(54, 2, 'Proteínas', 'Nutrientes', '3.40', 'g'),
(55, 2, 'Sal', 'Nutrientes', '0.10', 'g'),
(56, 2, 'Água ', 'Nutrientes', '90.50', 'g'),
(57, 2, 'Ácidos orgânicos ', 'Nutrientes', '0.00', 'g'),
(58, 2, 'Colesterol ', 'Nutrientes', '1.00', 'mg'),
(59, 2, 'Vitamina A', 'Vitaminas', '0.00', 'µg'),
(60, 2, 'Caroteno', 'Vitaminas', '0.00', 'µg'),
(61, 2, 'Vitamina D', 'Vitaminas', '0.00', 'µg'),
(62, 2, 'Vitamina E', 'Vitaminas', '0.00', 'mg'),
(63, 2, 'Vitamina B1', 'Vitaminas', '0.05', 'mg'),
(64, 2, 'Vitamina B2', 'Vitaminas', '0.18', 'mg'),
(65, 2, 'Vitamina B3', 'Vitaminas', '0.10', 'mg'),
(66, 2, 'Equivalente a B3', 'Vitaminas', '0.80', 'mg'),
(67, 2, 'Triptofano', 'Vitaminas', '0.70', 'mg'),
(68, 2, 'Vitamina B6', 'Vitaminas', '0.05', 'mg'),
(69, 2, 'Vitamina B12 ', 'Vitaminas', '0.11', 'µg'),
(70, 2, 'Vitamina C', 'Vitaminas', '0.00', 'mg'),
(71, 2, 'Vitamina B9', 'Vitaminas', '1.00', 'µg'),
(72, 2, 'Cinza', 'Minerais', '0.77', 'g'),
(73, 2, 'Sódio', 'Minerais', '41.00', 'mg'),
(74, 2, 'Potássio', 'Minerais', '160.00', 'mg'),
(75, 2, 'Cálcio', 'Minerais', '110.00', 'mg'),
(76, 2, 'Fósforo', 'Minerais', '82.00', 'mg'),
(77, 2, 'Magnésio', 'Minerais', '10.00', 'mg'),
(78, 2, 'Ferro', 'Minerais', '0.10', 'g'),
(79, 2, 'Zinco', 'Minerais', '0.40', 'g'),
(80, 2, 'Selénio', 'Minerais', '0.00', 'µg'),
(81, 2, 'Iodo', 'Minerais', '16.00', 'µg'),
(82, 3, 'Energia', 'Nutrientes', '262.00', 'kcal'),
(83, 3, 'Lípidos', 'Nutrientes', '21.90', 'g'),
(84, 3, 'Ácidos gordos saturados', 'Nutrientes', '4.20', 'g'),
(85, 3, 'Ácidos gordos monoinsaturados', 'Nutrientes', '10.00', 'g'),
(86, 3, 'Ácidos gordos polinsaturados', 'Nutrientes', '5.10', 'g'),
(87, 3, 'Ácido linoleico', 'Nutrientes', '0.70', 'g'),
(88, 3, 'Ácidos gordos trans', 'Nutrientes', '0.00', 'g'),
(89, 3, 'Hidratos de carbono', 'Nutrientes', '0.00', 'g'),
(90, 3, 'Açúcares', 'Nutrientes', '0.00', 'g'),
(91, 3, 'Oligossacáridos', 'Nutrientes', '0.00', 'g'),
(92, 3, 'Amido', 'Nutrientes', '0.00', 'g'),
(93, 3, 'Fibra', 'Nutrientes', '0.00', 'g'),
(94, 3, 'Proteínas', 'Nutrientes', '16.20', 'g'),
(95, 3, 'Sal', 'Nutrientes', '0.10', 'g'),
(96, 3, 'Água ', 'Nutrientes', '60.50', 'g'),
(97, 3, 'Ácidos orgânicos ', 'Nutrientes', '0.00', 'g'),
(98, 3, 'Colesterol ', 'Nutrientes', '40.00', 'mg'),
(99, 3, 'Vitamina A', 'Vitaminas', '33.00', 'µg'),
(100, 3, 'Caroteno', 'Vitaminas', '0.00', 'µg'),
(101, 3, 'Vitamina D', 'Vitaminas', '11.00', 'µg'),
(102, 3, 'Vitamina E', 'Vitaminas', '4.00', 'mg'),
(103, 3, 'Vitamina B1', 'Vitaminas', '0.18', 'mg'),
(104, 3, 'Vitamina B2', 'Vitaminas', '0.04', 'mg'),
(105, 3, 'Vitamina B3', 'Vitaminas', '3.60', 'mg'),
(106, 3, 'Equivalente a B3', 'Vitaminas', '6.60', 'mg'),
(107, 3, 'Triptofano', 'Vitaminas', '3.00', 'mg'),
(108, 3, 'Vitamina B6', 'Vitaminas', '0.45', 'mg'),
(109, 3, 'Vitamina B12 ', 'Vitaminas', '1.90', 'µg'),
(110, 3, 'Vitamina C', 'Vitaminas', '0.00', 'mg'),
(111, 3, 'Vitamina B9', 'Vitaminas', '10.00', 'µg'),
(112, 3, 'Cinza', 'Minerais', '1.30', 'g'),
(113, 3, 'Sódio', 'Minerais', '38.00', 'mg'),
(114, 3, 'Potássio', 'Minerais', '300.00', 'mg'),
(115, 3, 'Cálcio', 'Minerais', '12.00', 'mg'),
(116, 3, 'Fósforo', 'Minerais', '210.00', 'mg'),
(117, 3, 'Magnésio', 'Minerais', '23.00', 'mg'),
(118, 3, 'Ferro', 'Minerais', '0.50', 'g'),
(119, 3, 'Zinco', 'Minerais', '0.50', 'g'),
(120, 3, 'Selénio', 'Minerais', '0.00', 'µg'),
(121, 3, 'Iodo', 'Minerais', '0.00', 'µg'),
(122, 4, 'Energia', 'Nutrientes', '589.00', 'kcal'),
(123, 4, 'Lípidos', 'Nutrientes', '47.70', 'g'),
(124, 4, 'Ácidos gordos saturados', 'Nutrientes', '8.50', 'g'),
(125, 4, 'Ácidos gordos monoinsaturados', 'Nutrientes', '21.80', 'g'),
(126, 4, 'Ácidos gordos polinsaturados', 'Nutrientes', '14.80', 'g'),
(127, 4, 'Ácido linoleico', 'Nutrientes', '14.30', 'g'),
(128, 4, 'Ácidos gordos trans', 'Nutrientes', '0.00', 'g'),
(129, 4, 'Hidratos de carbono', 'Nutrientes', '10.10', 'g'),
(130, 4, 'Açúcares', 'Nutrientes', '4.80', 'g'),
(131, 4, 'Oligossacáridos', 'Nutrientes', '0.00', 'g'),
(132, 4, 'Amido', 'Nutrientes', '5.30', 'g'),
(133, 4, 'Fibra', 'Nutrientes', '8.80', 'g'),
(134, 4, 'Proteínas', 'Nutrientes', '25.40', 'g'),
(135, 4, 'Sal', 'Nutrientes', '0.00', 'g'),
(136, 4, 'Água ', 'Nutrientes', '5.70', 'g'),
(137, 4, 'Ácidos orgânicos ', 'Nutrientes', '0.00', 'g'),
(138, 4, 'Colesterol ', 'Nutrientes', '0.00', 'mg'),
(139, 4, 'Vitamina A', 'Vitaminas', '0.00', 'µg'),
(140, 4, 'Caroteno', 'Vitaminas', '0.00', 'µg'),
(141, 4, 'Vitamina D', 'Vitaminas', '0.00', 'µg'),
(142, 4, 'Vitamina E', 'Vitaminas', '9.90', 'mg'),
(143, 4, 'Vitamina B1', 'Vitaminas', '0.90', 'mg'),
(144, 4, 'Vitamina B2', 'Vitaminas', '0.13', 'mg'),
(145, 4, 'Vitamina B3', 'Vitaminas', '15.00', 'mg'),
(146, 4, 'Equivalente a B3', 'Vitaminas', '20.00', 'mg'),
(147, 4, 'Triptofano', 'Vitaminas', '5.50', 'mg'),
(148, 4, 'Vitamina B6', 'Vitaminas', '0.44', 'mg'),
(149, 4, 'Vitamina B12 ', 'Vitaminas', '0.00', 'µg'),
(150, 4, 'Vitamina C', 'Vitaminas', '0.00', 'mg'),
(151, 4, 'Vitamina B9', 'Vitaminas', '110.00', 'µg'),
(152, 4, 'Cinza', 'Minerais', '2.60', 'g'),
(153, 4, 'Sódio', 'Minerais', '7.00', 'mg'),
(154, 4, 'Potássio', 'Minerais', '680.00', 'mg'),
(155, 4, 'Cálcio', 'Minerais', '62.00', 'mg'),
(156, 4, 'Fósforo', 'Minerais', '380.00', 'mg'),
(157, 4, 'Magnésio', 'Minerais', '180.00', 'mg'),
(158, 4, 'Ferro', 'Minerais', '2.20', 'g'),
(159, 4, 'Zinco', 'Minerais', '3.20', 'g'),
(160, 4, 'Selénio', 'Minerais', '0.00', 'µg'),
(161, 4, 'Iodo', 'Minerais', '0.00', 'µg'),
(162, 5, 'Energia', 'Nutrientes', '72.00', 'kcal'),
(163, 5, 'Lípidos', 'Nutrientes', '0.60', 'g'),
(164, 5, 'Ácidos gordos saturados', 'Nutrientes', '0.10', 'g'),
(165, 5, 'Ácidos gordos monoinsaturados', 'Nutrientes', '0.00', 'g'),
(166, 5, 'Ácidos gordos polinsaturados', 'Nutrientes', '0.30', 'g'),
(167, 5, 'Ácido linoleico', 'Nutrientes', '0.30', 'g'),
(168, 5, 'Ácidos gordos trans', 'Nutrientes', '0.00', 'g'),
(169, 5, 'Hidratos de carbono', 'Nutrientes', '11.30', 'g'),
(170, 5, 'Açúcares', 'Nutrientes', '1.30', 'g'),
(171, 5, 'Oligossacáridos', 'Nutrientes', '0.00', 'g'),
(172, 5, 'Amido', 'Nutrientes', '10.00', 'g'),
(173, 5, 'Fibra', 'Nutrientes', '3.00', 'g'),
(174, 5, 'Proteínas', 'Nutrientes', '3.80', 'g'),
(175, 5, 'Sal', 'Nutrientes', '0.00', 'g'),
(176, 5, 'Água ', 'Nutrientes', '79.80', 'g'),
(177, 5, 'Ácidos orgânicos ', 'Nutrientes', '0.00', 'g'),
(178, 5, 'Colesterol ', 'Nutrientes', '0.00', 'mg'),
(179, 5, 'Vitamina A', 'Vitaminas', '0.00', 'µg'),
(180, 5, 'Caroteno', 'Vitaminas', '0.00', 'µg'),
(181, 5, 'Vitamina D', 'Vitaminas', '0.00', 'µg'),
(182, 5, 'Vitamina E', 'Vitaminas', '0.01', 'mg'),
(183, 5, 'Vitamina B1', 'Vitaminas', '0.21', 'mg'),
(184, 5, 'Vitamina B2', 'Vitaminas', '0.02', 'mg'),
(185, 5, 'Vitamina B3', 'Vitaminas', '0.60', 'mg'),
(186, 5, 'Equivalente a B3', 'Vitaminas', '1.40', 'mg'),
(187, 5, 'Triptofano', 'Vitaminas', '0.80', 'mg'),
(188, 5, 'Vitamina B6', 'Vitaminas', '0.38', 'mg'),
(189, 5, 'Vitamina B12 ', 'Vitaminas', '0.00', 'µg'),
(190, 5, 'Vitamina C', 'Vitaminas', '17.00', 'mg'),
(191, 5, 'Vitamina B9', 'Vitaminas', '3.00', 'µg'),
(192, 5, 'Cinza', 'Minerais', '1.00', 'g'),
(193, 5, 'Sódio', 'Minerais', '10.00', 'mg'),
(194, 5, 'Potássio', 'Minerais', '350.00', 'mg'),
(195, 5, 'Cálcio', 'Minerais', '17.00', 'mg'),
(196, 5, 'Fósforo', 'Minerais', '86.00', 'mg'),
(197, 5, 'Magnésio', 'Minerais', '17.00', 'mg'),
(198, 5, 'Ferro', 'Minerais', '0.80', 'g'),
(199, 5, 'Zinco', 'Minerais', '0.70', 'g'),
(200, 5, 'Selénio', 'Minerais', '0.00', 'µg'),
(201, 5, 'Iodo', 'Minerais', '0.00', 'µg'),
(202, 6, 'Energia', 'Nutrientes', '47.00', 'kcal'),
(203, 6, 'Lípidos', 'Nutrientes', '0.20', 'g'),
(204, 6, 'Ácidos gordos saturados', 'Nutrientes', '0.00', 'g'),
(205, 6, 'Ácidos gordos monoinsaturados', 'Nutrientes', '0.00', 'g'),
(206, 6, 'Ácidos gordos polinsaturados', 'Nutrientes', '0.10', 'g'),
(207, 6, 'Ácido linoleico', 'Nutrientes', '0.00', 'g'),
(208, 6, 'Ácidos gordos trans', 'Nutrientes', '0.00', 'g'),
(209, 6, 'Hidratos de carbono', 'Nutrientes', '8.90', 'g'),
(210, 6, 'Açúcares', 'Nutrientes', '8.90', 'g'),
(211, 6, 'Oligossacáridos', 'Nutrientes', '0.00', 'g'),
(212, 6, 'Amido', 'Nutrientes', '0.00', 'g'),
(213, 6, 'Fibra', 'Nutrientes', '1.80', 'g'),
(214, 6, 'Proteínas', 'Nutrientes', '1.10', 'g'),
(215, 6, 'Sal', 'Nutrientes', '0.00', 'g'),
(216, 6, 'Água ', 'Nutrientes', '86.30', 'g'),
(217, 6, 'Ácidos orgânicos ', 'Nutrientes', '0.70', 'g'),
(218, 6, 'Colesterol ', 'Nutrientes', '0.00', 'mg'),
(219, 6, 'Vitamina A', 'Vitaminas', '20.00', 'µg'),
(220, 6, 'Caroteno', 'Vitaminas', '120.00', 'µg'),
(221, 6, 'Vitamina D', 'Vitaminas', '0.00', 'µg'),
(222, 6, 'Vitamina E', 'Vitaminas', '0.24', 'mg'),
(223, 6, 'Vitamina B1', 'Vitaminas', '0.09', 'mg'),
(224, 6, 'Vitamina B2', 'Vitaminas', '0.05', 'mg'),
(225, 6, 'Vitamina B3', 'Vitaminas', '0.70', 'mg'),
(226, 6, 'Equivalente a B3', 'Vitaminas', '0.80', 'mg'),
(227, 6, 'Triptofano', 'Vitaminas', '0.10', 'mg'),
(228, 6, 'Vitamina B6', 'Vitaminas', '0.10', 'mg'),
(229, 6, 'Vitamina B12 ', 'Vitaminas', '0.00', 'µg'),
(230, 6, 'Vitamina C', 'Vitaminas', '57.00', 'mg'),
(231, 6, 'Vitamina B9', 'Vitaminas', '31.00', 'µg'),
(232, 6, 'Cinza', 'Minerais', '0.42', 'g'),
(233, 6, 'Sódio', 'Minerais', '4.00', 'mg'),
(234, 6, 'Potássio', 'Minerais', '160.00', 'mg'),
(235, 6, 'Cálcio', 'Minerais', '35.00', 'mg'),
(236, 6, 'Fósforo', 'Minerais', '19.00', 'mg'),
(237, 6, 'Magnésio', 'Minerais', '11.00', 'mg'),
(238, 6, 'Ferro', 'Minerais', '0.20', 'g'),
(239, 6, 'Zinco', 'Minerais', '0.10', 'g'),
(240, 6, 'Selénio', 'Minerais', '0.00', 'µg'),
(241, 6, 'Iodo', 'Minerais', '0.30', 'µg'),
(242, 7, 'Energia', 'Nutrientes', '176.00', 'kcal'),
(243, 7, 'Lípidos', 'Nutrientes', '17.40', 'g'),
(244, 7, 'Ácidos gordos saturados', 'Nutrientes', '4.20', 'g'),
(245, 7, 'Ácidos gordos monoinsaturados', 'Nutrientes', '10.00', 'g'),
(246, 7, 'Ácidos gordos polinsaturados', 'Nutrientes', '2.30', 'g'),
(247, 7, 'Ácido linoleico', 'Nutrientes', '1.10', 'g'),
(248, 7, 'Ácidos gordos trans', 'Nutrientes', '0.00', 'g'),
(249, 7, 'Hidratos de carbono', 'Nutrientes', '2.30', 'g'),
(250, 7, 'Açúcares', 'Nutrientes', '2.30', 'g'),
(251, 7, 'Oligossacáridos', 'Nutrientes', '0.00', 'g'),
(252, 7, 'Amido', 'Nutrientes', '0.00', 'g'),
(253, 7, 'Fibra', 'Nutrientes', '3.00', 'g'),
(254, 7, 'Proteínas', 'Nutrientes', '1.10', 'g'),
(255, 7, 'Sal', 'Nutrientes', '0.00', 'g'),
(256, 7, 'Água ', 'Nutrientes', '71.50', 'g'),
(257, 7, 'Ácidos orgânicos ', 'Nutrientes', '0.00', 'g'),
(258, 7, 'Colesterol ', 'Nutrientes', '0.00', 'mg'),
(259, 7, 'Vitamina A', 'Vitaminas', '5.00', 'µg'),
(260, 7, 'Caroteno', 'Vitaminas', '32.00', 'µg'),
(261, 7, 'Vitamina D', 'Vitaminas', '0.00', 'µg'),
(262, 7, 'Vitamina E', 'Vitaminas', '2.10', 'mg'),
(263, 7, 'Vitamina B1', 'Vitaminas', '0.10', 'mg'),
(264, 7, 'Vitamina B2', 'Vitaminas', '0.17', 'mg'),
(265, 7, 'Vitamina B3', 'Vitaminas', '1.10', 'mg'),
(266, 7, 'Equivalente a B3', 'Vitaminas', '1.30', 'mg'),
(267, 7, 'Triptofano', 'Vitaminas', '1.10', 'mg'),
(268, 7, 'Vitamina B6', 'Vitaminas', '0.30', 'mg'),
(269, 7, 'Vitamina B12 ', 'Vitaminas', '0.00', 'µg'),
(270, 7, 'Vitamina C', 'Vitaminas', '3.00', 'mg'),
(271, 7, 'Vitamina B9', 'Vitaminas', '11.00', 'µg'),
(272, 7, 'Cinza', 'Minerais', '0.75', 'g'),
(273, 7, 'Sódio', 'Minerais', '15.00', 'mg'),
(274, 7, 'Potássio', 'Minerais', '330.00', 'mg'),
(275, 7, 'Cálcio', 'Minerais', '4.00', 'mg'),
(276, 7, 'Fósforo', 'Minerais', '36.00', 'mg'),
(277, 7, 'Magnésio', 'Minerais', '21.00', 'mg'),
(278, 7, 'Ferro', 'Minerais', '0.30', 'g'),
(279, 7, 'Zinco', 'Minerais', '0.30', 'g'),
(280, 7, 'Selénio', 'Minerais', '0.00', 'µg'),
(281, 7, 'Iodo', 'Minerais', '0.00', 'µg'),
(282, 8, 'Energia', 'Nutrientes', '699.00', 'kcal'),
(283, 8, 'Lípidos', 'Nutrientes', '67.50', 'g'),
(284, 8, 'Ácidos gordos saturados', 'Nutrientes', '15.00', 'g'),
(285, 8, 'Ácidos gordos monoinsaturados', 'Nutrientes', '47.00', 'g'),
(286, 8, 'Ácidos gordos polinsaturados', 'Nutrientes', '2.30', 'g'),
(287, 8, 'Ácido linoleico', 'Nutrientes', '38.00', 'g'),
(288, 8, 'Ácidos gordos trans', 'Nutrientes', '0.00', 'g'),
(289, 8, 'Hidratos de carbono', 'Nutrientes', '3.60', 'g'),
(290, 8, 'Açúcares', 'Nutrientes', '2.60', 'g'),
(291, 8, 'Oligossacáridos', 'Nutrientes', '0.00', 'g'),
(292, 8, 'Amido', 'Nutrientes', '1.00', 'g'),
(293, 8, 'Fibra', 'Nutrientes', '5.20', 'g'),
(294, 8, 'Proteínas', 'Nutrientes', '16.70', 'g'),
(295, 8, 'Sal', 'Nutrientes', '0.00', 'g'),
(296, 8, 'Água ', 'Nutrientes', '4.90', 'g'),
(297, 8, 'Ácidos orgânicos ', 'Nutrientes', '0.00', 'g'),
(298, 8, 'Colesterol ', 'Nutrientes', '0.00', 'mg'),
(299, 8, 'Vitamina A', 'Vitaminas', '0.00', 'µg'),
(300, 8, 'Caroteno', 'Vitaminas', '0.00', 'µg'),
(301, 8, 'Vitamina D', 'Vitaminas', '0.00', 'µg'),
(302, 8, 'Vitamina E', 'Vitaminas', '3.80', 'mg'),
(303, 8, 'Vitamina B1', 'Vitaminas', '0.33', 'mg'),
(304, 8, 'Vitamina B2', 'Vitaminas', '0.14', 'mg'),
(305, 8, 'Vitamina B3', 'Vitaminas', '0.90', 'mg'),
(306, 8, 'Equivalente a B3', 'Vitaminas', '3.60', 'mg'),
(307, 8, 'Triptofano', 'Vitaminas', '2.70', 'mg'),
(308, 8, 'Vitamina B6', 'Vitaminas', '0.67', 'mg'),
(309, 8, 'Vitamina B12 ', 'Vitaminas', '0.00', 'µg'),
(310, 8, 'Vitamina C', 'Vitaminas', '1.00', 'mg'),
(311, 8, 'Vitamina B9', 'Vitaminas', '66.00', 'µg'),
(312, 8, 'Cinza', 'Minerais', '1.98', 'g'),
(313, 8, 'Sódio', 'Minerais', '12.00', 'mg'),
(314, 8, 'Potássio', 'Minerais', '500.00', 'mg'),
(315, 8, 'Cálcio', 'Minerais', '90.00', 'mg'),
(316, 8, 'Fósforo', 'Minerais', '290.00', 'mg'),
(317, 8, 'Magnésio', 'Minerais', '160.00', 'mg'),
(318, 8, 'Ferro', 'Minerais', '2.60', 'g'),
(319, 8, 'Zinco', 'Minerais', '2.70', 'g'),
(320, 8, 'Selénio', 'Minerais', '0.00', 'µg'),
(321, 8, 'Iodo', 'Minerais', '0.00', 'µg'),
(362, 9, 'Energia', 'Nutrientes', '104.00', 'kcal'),
(363, 9, 'Lípidos', 'Nutrientes', '0.40', 'g'),
(364, 9, 'Ácidos gordos saturados', 'Nutrientes', '0.10', 'g'),
(365, 9, 'Ácidos gordos monoinsaturados', 'Nutrientes', '0.00', 'g'),
(366, 9, 'Ácidos gordos polinsaturados', 'Nutrientes', '0.10', 'g'),
(367, 9, 'Ácido linoleico', 'Nutrientes', '0.00', 'g'),
(368, 9, 'Ácidos gordos trans', 'Nutrientes', '0.00', 'g'),
(369, 9, 'Hidratos de carbono', 'Nutrientes', '21.80', 'g'),
(370, 9, 'Açúcares', 'Nutrientes', '19.60', 'g'),
(371, 9, 'Oligossacáridos', 'Nutrientes', '0.00', 'g'),
(372, 9, 'Amido', 'Nutrientes', '2.20', 'g'),
(373, 9, 'Fibra', 'Nutrientes', '3.10', 'g'),
(374, 9, 'Proteínas', 'Nutrientes', '1.60', 'g'),
(375, 9, 'Sal', 'Nutrientes', '0.00', 'g'),
(376, 9, 'Água ', 'Nutrientes', '72.10', 'g'),
(377, 9, 'Ácidos orgânicos ', 'Nutrientes', '0.30', 'g'),
(378, 9, 'Colesterol ', 'Nutrientes', '0.00', 'mg'),
(379, 9, 'Vitamina A', 'Vitaminas', '4.00', 'µg'),
(380, 9, 'Caroteno', 'Vitaminas', '21.00', 'µg'),
(381, 9, 'Vitamina D', 'Vitaminas', '0.00', 'µg'),
(382, 9, 'Vitamina E', 'Vitaminas', '0.27', 'mg'),
(383, 9, 'Vitamina B1', 'Vitaminas', '0.06', 'mg'),
(384, 9, 'Vitamina B2', 'Vitaminas', '0.07', 'mg'),
(385, 9, 'Vitamina B3', 'Vitaminas', '0.70', 'mg'),
(386, 9, 'Equivalente a B3', 'Vitaminas', '1.00', 'mg'),
(387, 9, 'Triptofano', 'Vitaminas', '0.30', 'mg'),
(388, 9, 'Vitamina B6', 'Vitaminas', '0.29', 'mg'),
(389, 9, 'Vitamina B12 ', 'Vitaminas', '0.00', 'µg'),
(390, 9, 'Vitamina C', 'Vitaminas', '10.00', 'mg'),
(391, 9, 'Vitamina B9', 'Vitaminas', '14.00', 'µg'),
(392, 9, 'Cinza', 'Minerais', '0.89', 'g'),
(393, 9, 'Sódio', 'Minerais', '6.00', 'mg'),
(394, 9, 'Potássio', 'Minerais', '430.00', 'mg'),
(395, 9, 'Cálcio', 'Minerais', '8.00', 'mg'),
(396, 9, 'Fósforo', 'Minerais', '25.00', 'mg'),
(397, 9, 'Magnésio', 'Minerais', '28.00', 'mg'),
(398, 9, 'Ferro', 'Minerais', '0.40', 'g'),
(399, 9, 'Zinco', 'Minerais', '0.20', 'g'),
(400, 9, 'Selénio', 'Minerais', '0.00', 'µg'),
(401, 9, 'Iodo', 'Minerais', '3.80', 'µg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recipes`
--

CREATE TABLE `recipes` (
  `idrecipe` int(11) NOT NULL,
  `idfood` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `ingredients` text NOT NULL,
  `n_ing` int(2) NOT NULL,
  `steps` text NOT NULL,
  `images` varchar(50) NOT NULL,
  `servings` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `recipes`
--

INSERT INTO `recipes` (`idrecipe`, `idfood`, `title`, `ingredients`, `n_ing`, `steps`, `images`, `servings`, `time`) VALUES
(1, 8, 'Muffin de aveia, noz e laranja', '3 nozes de nogueira\n2g fermento\n1 ovo médio\n1 colher de sopa canela\n1/2 laranja\n25 ml bebida de arroz\n25 ml bebida de coco\n35 g flocos de aveia integral finos', 8, '1. Adicione o ovo, as bebidas vegetais, o fermento, a casca de laranja, a aveia e triture no liquidificador.\n2. Adicione as nozes picadas grosseiramente e a canela e misture bem. 3. Deixe algumas nozes e canela para uso posterior.\n4. Despeje a mistura em formas e coloque 1/4 de noz em cima de cada muffin.\n5. Asse por 15 minutos a 150 ° C.\nRetire do forno e polvilhe com canela.', 'muffin.jpg', 6, 20),
(2, 8, 'Biscoitos de noz', '4 nozes de nogueira\r\n2 colheres de sopa azeite\r\n10 g maca em pó biológica\r\n20 g linhaça castanha\r\n70 g farinha de amêndoa\r\n60 g farinha de soja\r\n2 g agar agar', 7, '1. Misture a linhaça e o ágar com duas colheres de sopa de água morna. Deixe repousar por 10 minutos.\r\n2. Misture os demais ingredientes e acrescente a mistura de linhaça.\r\n3. Coloque em uma assadeira forrada com papel manteiga. Pressione para nivelar.\r\n4. Asse em forno pré-aquecido a 180°C por 45 minutos.\r\n5. Deixe arrefecer antes de retirar da forma e cortar em quadrados.', 'biscoitos.jpg', 8, 60),
(3, 1, 'Lasanha de atum e espinafres', '1 grande cebola\r\n40 ml vinho branco de mesa\r\n1 dose azeite extra-virgem\r\n200 ml molho bechamel\r\n320 g atum ao natural\r\n75 ml polpa de tomate\r\n200 ml leite de coco\r\n200 g espinafres em folhas\r\n100 g queijo mozzarella ralado\r\n200 g folhas de lasanha', 10, '1. Numa frigideira pré-aquecida com azeite, refogue a cebola, junte o vinho e a polpa de tomate. Mexer.\n2. Em seguida, adicione o atum e as folhas de espinafre. Misture bem e reserve.\n3. Em um copo, misture o molho bechamel com o leite de coco.\n4. Monte a camada de lasanha em um pirex. Coloque as primeiras folhas da lasanha, espalhe o recheio seguido do molho. Repita essas etapas até ficar sem folhas de lasanha. Coloque o queijo mozzarella por cima.\n5. Asse em forno pré-aquecido por 20 minutos.', 'lasanha.espinafres.jpg', 6, 60),
(4, 1, 'Sopa de espinafres', '6 nozes de nogueira\n1 pitada sal\n1 colher de sopa azeite\n1 chávena de fatiados cogumelos brancos (salteado em wok)\n100 ml leite de amêndoas\n200 g espinafre baby leaf\n2 g alga kombu', 7, '1. Torre levemente as nozes em uma frigideira antiaderente por 3 minutos. \n2. Deixe esfriar e depois reserve.\n3. Refogue os cogumelos no azeite.\n4. Adicionar os espinafres e alga kombu.\n5. Adicione o leite de amêndoas e tempere com sal.\n6. Cozinhe por 5 minutos enquanto mexe.\nSirva em uma tigela com nozes tostadas.', 'sopa.jpg', 2, 30),
(5, 1, 'Bolo de cenoura e espinafres', '3 médios ovos\n30 g nozes de nogueira\n30 g passas\n3 médias cenouras\n50 g farinha de milho\n200 g farelo de aveia\n50 g espinafre bébe\n125 g iogurte natural\n200 g mel de flores', 9, '1. Triturar a cenoura, os espinafres e as nozes.\n2. Juntar todos os ingredientes e mexer.\n3. Levar ao forno pré aquecido.', 'bolo.cenoura.espinafres.jpg', 8, 50),
(6, 3, 'Salmão grelhado com salada de abacate', '100 g salmão\n1 limão\n100 g abacate\n1/2 lua de tomate\n1 colher de sopa salsa\n1 pitada pimenta preta\n1 pitada sal\n1 chávena de cebolas cortadas\n1 colher de sopa azeite extra virgem\n25 g nozes\n1 fatia queijo mozarela', 11, '1. Tempere os dois lados do salmão com sal, sumo de limão e pimenta.\n2. Unte a grelha do forno com meia colher de azeite e grelhe o salmão em forno pré-aquecido por 5 minutos de cada lado.\n3. Corte em pedaços o abacate, a cebola, o tomate, a salsa e o queijo mozarela, esmague as nozes e coloque-as numa tigela, tempere com sal, pimenta e azeite. Misture bem.\n4. Coloque o salmão grelhado com a salada em um prato. Servir.', 'salmao.salada.abacate.jpg', 2, 20),
(7, 3, 'Noodles com salmão fumado', '200 g salmão fumado\n1/2 chávena molho de soja\n400 g noodles\n5 folhas hortelã\n1 colher de chá óleo de sésamo torrado\nSumo de 1 lima\n1 colher de chá gengibre ralado\n1 colher de sopa de cebolinho picado\n4 colheres de chá açúcar amarelo\n25 g sementes de sésamo torradas', 10, '1. Cozinhe os noodles de acordo com as instruções na embalagem. Escorra e reserve.\n2. Numa tigela grande, misture o molho de soja, açúcar amarelo, óleo de sésamo, gengibre, sumo de lima e as sementes de sésamo.\n3. Adicione os noodles, cebolinho, hortelã e o salmão. Misture bem e sirva frio.', 'noodles.jpg', 4, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestions`
--

CREATE TABLE `sugestions` (
  `sid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`idbenefit`);

--
-- Índices para tabela `comunity`
--
ALTER TABLE `comunity`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`idfood`);

--
-- Índices para tabela `food_benefit`
--
ALTER TABLE `food_benefit`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `glossary`
--
ALTER TABLE `glossary`
  ADD PRIMARY KEY (`idglossary`);

--
-- Índices para tabela `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `nutrition`
--
ALTER TABLE `nutrition`
  ADD PRIMARY KEY (`idnutri`);

--
-- Índices para tabela `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`idrecipe`);

--
-- Índices para tabela `sugestions`
--
ALTER TABLE `sugestions`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `benefits`
--
ALTER TABLE `benefits`
  MODIFY `idbenefit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `comunity`
--
ALTER TABLE `comunity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `food`
--
ALTER TABLE `food`
  MODIFY `idfood` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `food_benefit`
--
ALTER TABLE `food_benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `glossary`
--
ALTER TABLE `glossary`
  MODIFY `idglossary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `nutrition`
--
ALTER TABLE `nutrition`
  MODIFY `idnutri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT de tabela `recipes`
--
ALTER TABLE `recipes`
  MODIFY `idrecipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `sugestions`
--
ALTER TABLE `sugestions`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
