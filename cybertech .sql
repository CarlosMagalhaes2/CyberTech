-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2023 at 06:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybertech`
--
CREATE DATABASE IF NOT EXISTS `cybertech` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cybertech`;

-- --------------------------------------------------------

--
-- Table structure for table `carateristicas`
--

DROP TABLE IF EXISTS `carateristicas`;
CREATE TABLE `carateristicas` (
  `IdCategoria` int(11) NOT NULL,
  `NomeProduto` varchar(255) NOT NULL,
  `IdProduto` int(11) NOT NULL,
  `Processador` varchar(255) DEFAULT NULL,
  `MemoriaRAM` varchar(255) DEFAULT NULL,
  `PlacaGrafica` varchar(255) DEFAULT NULL,
  `PlacaGrafica2` varchar(255) DEFAULT NULL,
  `Armazenamento` varchar(255) DEFAULT NULL,
  `TipoArmazenamento` varchar(255) DEFAULT NULL,
  `Resolucao` varchar(255) DEFAULT NULL,
  `TamanhoEcra` varchar(255) DEFAULT NULL,
  `SistemaOperativo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carateristicas`
--

INSERT INTO `carateristicas` (`IdCategoria`, `NomeProduto`, `IdProduto`, `Processador`, `MemoriaRAM`, `PlacaGrafica`, `PlacaGrafica2`, `Armazenamento`, `TipoArmazenamento`, `Resolucao`, `TamanhoEcra`, `SistemaOperativo`) VALUES
(0, 'Lenovo Legion 5 (6ª Geração) 15ACH6-255 15.6\"', 2, 'AMD Ryzen 7 5800H', '16 GB', 'GeForce RTX 3070', 'Radeon Graphics', '512 GB', 'SSD', '1920 x 1080 (Full HD)', '15.6', 'Não Incluído (Free DOS)'),
(1, 'Apple MacBook Pro 2021', 3, 'Apple M1 Pro 8-core', '16 GB', 'GPU 14‑core', 'Neural Engine 16‑core', '512 GB', 'SSD', '3024 x 1964', '14.2\"', 'macOS'),
(3, 'msiModern15B12M-046PT_1', 4, 'Intel Core i7-1255U', '16 GB', 'Intel Iris Xe Graphics', NULL, '1 TB', 'SSD', '1920 x 1080 (Full HD)', '15.6\"', 'Windows 11 Home'),
(5, 'Samsung Galaxy M23 5G 6.6\" 4GB/128GB Dual SIM Laranja', 5, 'Qualcomm Snapdragon 750G', '4 GB', NULL, NULL, '128 GB', NULL, '2400 x 1080', '6.6\"', 'Android 12'),
(6, 'Apple iPhone 14 6.1\" 256GB Meia-Noite', 6, 'Apple A15 Bionic', '', '', '', '256 GB', '', '2532 x 1170', '6.1', 'Apple iOS'),
(7, 'MSI MAG Codex 5 12TC-1478ES', 7, 'Intel Core i5-12400F', '16 GB', 'GeForce RTX 3060', NULL, '512 GB', 'SSD', NULL, NULL, 'Não Incluído (Free DOS)'),
(8, 'LG UltraGear 27GN60R-B IPS 27', 8, '', '', '', '', '', '', '1920 x 1080 (Full HD)', '27\"', ''),
(12, 'Xiaomi Mi Gaming VA 34', 12, '', '', '', '', '', '', '3440 x 1440 (UltraWide QHD)', '34\"', ''),
(13, 'Asus Zenfone 9 5.9', 13, 'Qualcomm Snapdragon 8+ Gen 1', '8 GB', '', '', '128 GB', '', '2400 x 1080', '5.9\"', 'Android 12');

-- --------------------------------------------------------

--
-- Table structure for table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE `carrinho` (
  `ID` int(11) NOT NULL,
  `Id_utilizador` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Preco` varchar(255) NOT NULL,
  `Imagem` varchar(255) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `StockProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrinho`
--

INSERT INTO `carrinho` (`ID`, `Id_utilizador`, `Nome`, `Preco`, `Imagem`, `Quantidade`, `StockProduto`) VALUES
(10, 0, 'Samsung Galaxy M23 5G 6.6', '199', 'SamsungGalaxyM23_5GLaranja.jpg', 1, 0),
(32, 4, 'Apple MacBook Pro 2021 14.2', '2099.99', 'macbookPro2021M1ProCinzento_1.jpg', 1, 0),
(33, 4, 'Lenovo Legion 5 (6ª Geração) 15ACH6-255 15.6', '1499.99', 'LenovoLegion5_15ACH6-255_1.jpg', 1, 0),
(34, 4, 'Samsung Galaxy M23 5G 6.6', '199.90', 'SamsungGalaxyM23_5GLaranja.jpg', 1, 0),
(47, 1, 'Lenovo Legion 5 (6ª Geração) 15ACH6-255 15.6', '1499.99', 'LenovoLegion5_15ACH6-255_1.jpg', 6, 6),
(48, 1, 'Apple MacBook Pro 2021 14.2', '2099.99', 'macbookPro2021M1ProCinzento_1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE `favoritos` (
  `ID` int(11) NOT NULL,
  `Id_utilizador` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Preco` varchar(255) NOT NULL,
  `Imagem` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Fabricante` varchar(255) NOT NULL,
  `ImagemPrincipal` varchar(255) NOT NULL,
  `Preco` decimal(10,2) NOT NULL,
  `Categoria` varchar(255) NOT NULL,
  `SubCategoria` varchar(255) NOT NULL,
  `Descricao` text NOT NULL,
  `Stock` int(11) NOT NULL,
  `Carateristicas` int(11) DEFAULT NULL,
  `Desconto` tinyint(1) NOT NULL,
  `ValorDesconto` int(11) DEFAULT NULL,
  `Destaque` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`ID`, `Nome`, `Fabricante`, `ImagemPrincipal`, `Preco`, `Categoria`, `SubCategoria`, `Descricao`, `Stock`, `Carateristicas`, `Desconto`, `ValorDesconto`, `Destaque`) VALUES
(2, 'Lenovo Legion 5 (6ª Geração) 15ACH6-255 15.6', 'Lenovo', 'LenovoLegion5_15ACH6-255_1.jpg', 1499.99, '', '', '<p><strong>ATUALIZA&Ccedil;&Atilde;O R&Aacute;PIDA, CORES PROFUNDAS.<br></strong>Quer procure a mais r&aacute;pida taxa de atualiza&ccedil;&atilde;o poss&iacute;vel para aumentar a vantagem nos jogos eSports ou os efeitos de ilumina&ccedil;&atilde;o mais deslumbrantes, conte com o Legion 5(15\"). A escolha &eacute; sua neste ecr&atilde; Full HD (1920x1080) de 15,6\" (39,62 cm).</p>\r\n<p><strong>ATAQUE COM TODA A FOR&Ccedil;A. ATAQUE COM TODA A FIRMEZA.</strong><br>Port&aacute;til gaming Legion 5 eleva o controlo e a precis&atilde;o a novos patamares gra&ccedil;as ao teclado Legion TrueStrike. Criado tendo como base muitos anos de inova&ccedil;&atilde;o da Lenovo, o teclado TrueStrike conta com tecnologia 100% Anti-ghosting e teclas com impacto atenuado com um percurso de 1,5 mm. Tira partido de um design de segunda transi&ccedil;&atilde;o que permite premir com mais impacto, mas com a mesma for&ccedil;a em cada batimento, para melhorar a experi&ecirc;ncia de introdu&ccedil;&atilde;o de dados, seja num jogo competitivo ou n&atilde;o competitivo.</p>\r\n<p><strong>POT&Ecirc;NCIA E FLUIDEZ</strong><br>Concebido para se manter na arena de jogo para onde quer que v&aacute;, o Legion 5 conta com bateria para todo o dia e um sistema inteligente de gest&atilde;o da alimenta&ccedil;&atilde;o de descarregamento din&acirc;mico, tudo carregado atrav&eacute;s de um transformador elegante e fino que carrega a bateria de 0 a 50% em menos de 30 minutos com a funcionalidade Rapid Charge Pro. O Modo h&iacute;brido desativa a placa gr&aacute;fica dedicada quando n&atilde;o est&aacute; a jogar, enquanto a tecnologia Q Control 3.0 oferece um Modo silencioso que reduz os requisitos de tens&atilde;o para a CPU para desfrutar de in&uacute;meras horas de produtividade em autonomia.</p>\r\n<p><strong>A EMO&Ccedil;&Atilde;O DO DESIGN</strong><br>Com uma combina&ccedil;&atilde;o perfeita de lado pr&aacute;tico, precis&atilde;o e desempenho, o Legion 5 apresenta linhas minimalistas com apontamentos de design subtis, como a articula&ccedil;&atilde;o que reflete a luz, o acabamento do log&oacute;tipo e os duradouros materiais injetados com pol&iacute;mero de talco antimanchas. O discreto chassis em Preto melhora o equil&iacute;brio ao combinar o gaming e o seu estilo de vida di&aacute;rio atrav&eacute;s de um ecr&atilde; cristalino com moldura Mylar estreita em tr&ecirc;s lados e uma c&acirc;mara Web na parte superior com obturador de privacidade.</p>\r\n<ul>\r\n<li><strong>Processador:</strong>&nbsp;AMD Ryzen&trade; 7 5800H Octa-Core, 3.20 GHz com Turbo at&eacute; 4.40 GHz, 20 MB Cache</li>\r\n<li><strong>Sistema Operativo:&nbsp;</strong>\r\n<ul>\r\n<li>Sistema Operativo n&atilde;o inclu&iacute;do</li>\r\n</ul>\r\n</li>\r\n<li><strong>Mem&oacute;ria RAM:</strong>\r\n<ul>\r\n<li>16GB (2x8GB) DDR4 3200 MHz</li>\r\n<li>2 x Slots SO-DIMM (ocupados) p/ expansibilidade total at&eacute; 32GB</li>\r\n</ul>\r\n</li>\r\n<li><strong>Ecr&atilde;:</strong>&nbsp;15.6\" FHD (1920x1080) IPS 300nits Anti-glare, 165Hz, 100% sRGB, Dolby Vision, Free-Sync, G-Sync, DC dimmer</li>\r\n<li><strong>Placa Gr&aacute;fica:&nbsp;</strong>AMD Radeon Graphics + NVIDIA GeForce RTX 3070 8GB GDDR6 TGP 130W</li>\r\n<li><strong>Armazenamento:&nbsp;</strong>SSD 512GB M.2 2242 PCIe 3.0x4 NVMe</li>\r\n<li><strong>WebCam:</strong>&nbsp;C&acirc;mara HD 720p com microfone integrado</li>\r\n<li><strong>Comunica&ccedil;&otilde;es:</strong>\r\n<ul>\r\n<li>WiFi 6 (802.11 ax) + Bluetooth&reg; 5.1</li>\r\n<li>LAN&nbsp;10/100/1000M Gigabit Ethernet</li>\r\n</ul>\r\n</li>\r\n<li><strong>Interfaces:</strong>\r\n<ul>\r\n<li>1 x power connector</li>\r\n<li>1 x headphone / microphone combo jack (3.5mm)</li>\r\n<li>1 x HDMI 2.1</li>\r\n<li>4 x USB 3.2 Gen 1 (one Always On)</li>\r\n<li>1 x USB-C 3.2 Gen 2 (support data transfer, Power Delivery and DisplayPort 1.4)</li>\r\n<li>1 x USB-C 3.2 Gen 2 (support data transfer and DisplayPort 1.4)</li>\r\n<li>1 x&nbsp; Ethernet (RJ-45)</li>\r\n</ul>\r\n</li>\r\n<li><strong>&Aacute;udio:&nbsp;</strong>2 colunas Harman&reg; de 2 W com Nahimic Audio</li>\r\n<li><strong>Teclado:</strong>&nbsp;Layout PT, Retroilumina&ccedil;&atilde;o Branca</li>\r\n<li><strong>Bateria:</strong>&nbsp;60Wh</li>\r\n<li><strong>Dimens&otilde;es:</strong>&nbsp;362.56 x 260.61 x 22.5-25.75 mm</li>\r\n<li><strong>Peso:</strong>&nbsp;Apr&oacute;x. 2.4 kg</li>\r\n</ul>', 6, 0, 0, 0, 1),
(3, 'Apple MacBook Pro 2021 14.2', 'Apple', 'macbookPro2021M1ProCinzento_1.jpg', 2249.99, '', '', '<p><strong>POT&Ecirc;NCIA EM ESTADO PRO</strong><br>Chegou o MacBook Pro mais poderoso de sempre. Tem um gigantesco desempenho e autonomia gra&ccedil;as aos processadores ultrarr&aacute;pidos M1 Pro ou M1 Max, os primeiros concebidos pela Apple a pensar nos profissionais. Depois, conta ainda com um incr&iacute;vel ecr&atilde; Liquid Retina XDR e a melhor c&acirc;mara e som de um port&aacute;til Mac, al&eacute;m de todas as portas de que precisa. Este MacBook Pro &eacute; verdadeiramente revolucion&aacute;rio e &eacute; um colosso.</p>\r\n<p><strong>O PRO ELEVADO AO M&Aacute;XIMO</strong><br>A arquitetura M1 atinge um novo n&iacute;vel com os processadores M1 Pro e M1 Max. &Eacute; a primeira vez que um port&aacute;til profissional conta com o \"sistema num chip\" (SoC). Estes chips s&atilde;o verdadeiros prod&iacute;gios, com mais n&uacute;cleos de CPU e de GPU, superando em muito a mem&oacute;ria unificada do M1. Integram ainda um poderoso Neural Engine para a aprendizagem autom&aacute;tica e motores de conte&uacute;dos multim&eacute;dia mais avan&ccedil;ados e compat&iacute;veis com ProRes para executar tarefas completamente impens&aacute;veis at&eacute; agora.</p>\r\n<p><strong>LIQUID RETINA XDR</strong><br>O melhor ecr&atilde; alguma vez visto num port&aacute;til oferece M&aacute;xima gama din&acirc;mica e uma rela&ccedil;&atilde;o de contraste de um milh&atilde;o para um. Os conte&uacute;dos HDR ganham vida nas fotografias, v&iacute;deos e nos jogos, com efeitos de luz espetaculares, sombras com um n&iacute;vel de detalhe incr&iacute;vel e cores vibrantes e realistas. Cada ecr&atilde; vem calibrado de f&aacute;brica e inclui modos de refer&ecirc;ncia profissionais para a grada&ccedil;&atilde;o de cor HDR, fotografia, design e produ&ccedil;&atilde;o de materiais impressos.</p>\r\n<p><strong>PROMOTION</strong><br>ProMotion. O ProMotion chegou ao Mac pela primeira vez para oferecer uma resposta r&aacute;pida e fluida em qualquer tipo de tarefa, desde a navega&ccedil;&atilde;o na internet aos jogos. E com menor consumo de energia. Mas n&atilde;o fica por aqui, pois gra&ccedil;as &agrave;s taxas de atualiza&ccedil;&atilde;o at&eacute; 120 Hz, a tecnologia adaptativa faz ajustes autom&aacute;ticos em fun&ccedil;&atilde;o do movimento do conte&uacute;do. Assim, ao editar v&iacute;deo pode optar por uma taxa de atualiza&ccedil;&atilde;o fixa, de acordo com as imagens filmadas.</p>\r\n<p><strong>OLHE, UMA C&Acirc;MARA COM 1080P HD.</strong><br>Nunca foi t&atilde;o importante manter o contacto como hoje em dia. &Eacute; por isso que a c&acirc;mara do novo MacBook Pro tem o dobro da resolu&ccedil;&atilde;o (1080p) e uma lente com maior amplitude de abertura para captar mais luz. Com um sensor de imagem maior e p&iacute;xeis mais eficientes, a c&acirc;mara tem um desempenho duas vezes melhor em ambientes com pouca ilumina&ccedil;&atilde;o.</p>\r\n<p><strong>SISTEMA DE &Aacute;UDIO COM SEIS ALTIFALANTES</strong><br>Os quatro woofers com force‑cancelling permitem ouvir as notas numa escala at&eacute; meia oitava abaixo, produzindo um som envolvente e graves at&eacute; 80% mais profundos. Os tweeters de alto desempenho projetam vozes intensas e n&iacute;tidas.</p>\r\n<p><strong>&Aacute;UDIO ESPACIAL</strong><br>Com um poderoso sistema de seis altifalantes e algoritmos avan&ccedil;ados, o MacBook Pro &eacute; compat&iacute;vel com &aacute;udio espacial que, aliado ao Dolby Atmos, permite criar um som profissional sofisticado e tridimensional. Combinado com o ecr&atilde; Liquid Retina XDR, &eacute; uma verdadeira sala de cinema port&aacute;til.</p>\r\n<p><strong>MAIS LIGADO DO QUE NUNCA</strong><br>Transfira fotografias e v&iacute;deos com o leitor de cart&otilde;es SDXC. Ligue uma televis&atilde;o ou outros monitores com a sa&iacute;da HDMI. Ou&ccedil;a m&uacute;sica com uma sa&iacute;da para auscultadores de 3,5 mm com dete&ccedil;&atilde;o e ajuste autom&aacute;ticos para equipamento de alta imped&acirc;ncia. Use as tr&ecirc;s portas Thunderbolt 4 para ligar perif&eacute;ricos ou monitores de alta velocidade e a porta MagSafe 3 para fazer carregamentos r&aacute;pidos.</p>\r\n<ul>\r\n<li><strong>Processador:</strong>&nbsp;\r\n<ul>\r\n<li>CPU 8‑core com 6 n&uacute;cleos de desempenho e 2 n&uacute;cleos de efici&ecirc;ncia</li>\r\n<li>GPU 14‑core</li>\r\n<li>Neural Engine 16‑core</li>\r\n<li>200 GB/s de largura de banda da mem&oacute;ria</li>\r\n</ul>\r\n</li>\r\n<li><strong>Sistema Operativo:</strong>&nbsp;macOS</li>\r\n<li><strong>Mem&oacute;ria RAM:</strong>&nbsp;16&nbsp;GB de mem&oacute;ria unificada</li>\r\n<li><strong>Ecr&atilde;:&nbsp;</strong>Ecr&atilde; Liquid Retina XDR de 14,2 polegadas (diagonal); resolu&ccedil;&atilde;o nativa de 3024x1964 com 254 p&iacute;xeis por polegada</li>\r\n<li><strong>Armazenamento:</strong>&nbsp;SSD de 512 GB</li>\r\n<li><strong>C&acirc;mara:</strong>&nbsp;FaceTime HD 1080p</li>\r\n<li><strong>Comunica&ccedil;&otilde;es:&nbsp;</strong>\r\n<ul>\r\n<li>Rede wireless Wi‑Fi 6 802.11ac</li>\r\n<li>Compat&iacute;vel com IEEE 802.11a/b/g/n</li>\r\n<li>Tecnologia wireless Bluetooth 5.0</li>\r\n</ul>\r\n</li>\r\n<li><strong>Interface:</strong>\r\n<ul>\r\n<li>Ranhura para cart&otilde;es SDXC</li>\r\n<li>Porta HDMI</li>\r\n<li>Sa&iacute;da para auscultadores de 3,5 mm</li>\r\n<li>Porta MagSafe 3</li>\r\n<li>Tr&ecirc;s portas Thunderbolt 4 (USB‑C)</li>\r\n</ul>\r\n</li>\r\n<li><strong>&Aacute;udio:&nbsp;</strong>\r\n<ul>\r\n<li>Sistema de seis altifalantes de alta fidelidade e woofers com force‑cancelling</li>\r\n<li>Som est&eacute;reo amplo</li>\r\n<li>Compatibilidade com &aacute;udio espacial ao ouvir m&uacute;sica e ver v&iacute;deos com Dolby Atmos nos altifalantes integrados</li>\r\n<li>&Aacute;udio espacial com seguimento din&acirc;mico da posi&ccedil;&atilde;o da cabe&ccedil;a ao usar AirPods (3.&ordf; gera&ccedil;&atilde;o), AirPods Pro e AirPods Max</li>\r\n<li>Tr&ecirc;s microfones com qualidade de est&uacute;dio, alta rela&ccedil;&atilde;o sinal/ru&iacute;do e tecnologia beamforming direcional</li>\r\n<li>Sa&iacute;da para auscultadores de 3,5 mm com compati&shy;bilidade avan&ccedil;ada para equipamento de alta imped&acirc;ncia</li>\r\n</ul>\r\n</li>\r\n<li><strong>Teclado:</strong>&nbsp;Retroiluminado</li>\r\n<li><strong>Bateria:</strong>&nbsp;\r\n<ul>\r\n<li>At&eacute; 17 horas a ver filmes da app Apple TV</li>\r\n<li>At&eacute; 11 horas de internet wireless</li>\r\n<li>Bateria de pol&iacute;meros de l&iacute;tio de 70 watts‑hora</li>\r\n<li>Adaptador de corrente USB‑C de 67 W (inclu&iacute;do com o processador M1 Pro com CPU 8‑core)</li>\r\n<li>Adaptador de corrente USB‑C de 96 W (inclu&iacute;do com o processador M1 Pro com CPU 10‑core ou processador M1 Max, configur&aacute;vel com M1 Pro com CPU 8‑core)</li>\r\n<li>Cabo USB‑C para MagSafe 3</li>\r\n<li>Carrega&shy;mento r&aacute;pido com Adaptador de corrente USB‑C de 96 W</li>\r\n</ul>\r\n</li>\r\n<li><strong>Dimens&otilde;es:</strong>&nbsp;1,55 cm x 31,26 cm x 22,12 cm</li>\r\n<li><strong>Peso:</strong>&nbsp;1.61 kg</li>\r\n</ul>', 1, 1, 1, 150, 1),
(4, 'MSI 15.6\" Modern 15 B12M-046PT', 'MSI', 'msiModern15B12M-046PT_1.jpg', 899.90, '', '', 'Explore um novo capítulo na vida com o novo laptop da série Modern. A série Modern fina, poderosa e elegante está aqui para adicionar elegância à sua produtividade diária. Comece sua paixão aqui.\r\n\r\nASSUMA O DESTAQUE\r\nUm charme misterioso. Com a série Modern, você representará a vanguarda e liderará com estilo quando, onde e como quiser.\r\n\r\nDESEMPENHO DE PONTA\r\nA Série Modern apresenta um processador Intel® Core™ de 12ª geração e gráficos Intel® Iris® Xe, oferecendo maior desempenho em multitarefa e entretenimento. Especialmente com os gráficos Intel® Iris® Xe, ele oferece o desempenho para potencializar a sua produtividade diária.\r\n\r\nTOQUE. CLIQUE. DESLIZE.\r\nA série Modern mantém o seu fluxo de trabalho em andamento, com touchpad ampliado com controlo suave e responsivo na ponta dos dedos. A função lay-flat de 180° e Flip-n-Share permite que você compartilhe o seu ecrã com um clique para um espaço de trabalho mais produtivo. O deslocamento otimizado das teclas de 1.5 mm torna a experiência de escrita mais ergonómica. Graças a um teclado retroiluminado de tamanho normal, você pode trabalhar em ambientes escuros.\r\n\r\nVIAJE COM FACILIDADE\r\nCom o chassi extremamente portátil e ultrafino pesando 1.7 kg, o Modern 15 é um laptop leve feito para extrema mobilidade e aparência elegante onde quer que você vá.\r\n\r\nTODAS AS PORTAS QUE VOCÊ PRECISA\r\nO Modern 14 fornece todas as portas que você precisa, com USB-A, USB-C, Micro SD e HDMI. Você pode carregar enquanto conecta dispositivos simultaneamente.\r\n\r\nEUFORIA AUDITIVA\r\nMergulhe na sua música favorita com a série Modern no coração da cidade, experimente o som da maneira que deve ser ouvido. Com a capacidade de suportar amostragem de até 24 bits / 192kHz, seja no estúdio ou ao vivo. Você obterá 100% do som real, apenas sinta. Dance com isso. Cante com ele.\r\n\r\n \r\n\r\nProcessador: Intel® Core™ i7-1255U 10-Core, com Turbo até 4.7 GHz, 12 MB Cache\r\nSistema Operativo: Windows 11 Home\r\nMemória RAM: 16GB DDR4-3200MHz (onboard, não expansível)\r\nEcrã: 15.6\" Full HD (1920x1080), 60Hz, 45% NTSC, Nível IPS\r\nPlaca Gráfica: Intel® Iris® Xe Graphics\r\nArmazenamento: SSD 1TB NVMe PCIe Gen3x4\r\nWebcam: Tipo HD (30fps@720p)\r\nComunicações: Intel Wi-Fi 6 AX201 (2x2 ax) + Bluetooth 5.2\r\nInterface:\r\n2 x Type-A USB2.0\r\n1 x Leitor de cartões Micro SD\r\n1 x HDMI (4K @ 30Hz)\r\n1 x Type-A USB3.2 Gen2\r\n1 x Type-C USB3.2 Gen2 com PD charging\r\n1x Mic-in/Headphone-out Combo Jack\r\nÁudio: 2 x Colunas de 2W\r\nTeclado: Layout PT, Retroiluminado (luz branca)\r\nBateria: 3 Células, 39.3Whr\r\nDimensões: 359 x 241 x 19.9 mm\r\nPeso: 1.4 kg', 3, 3, 1, 60, 0),
(5, 'Samsung Galaxy M23 5G 6.6\" 4GB/128GB Dual SIM Laranja', 'Samsung', 'SamsungGalaxyM23_5GLaranja.jpg', 199.90, '', '', 'O PODER DO 5G\r\nO poder da próxima geração de dados móveis, desde jogos e streaming super fluído, a uploads e downloads super rápidos. Desfrute do processador Octa-core Snapdragon 750G com uma RAM de 4GB, para uma performance mais eficiente. A RAM Plus analisa os seus padrões de utilização e proporciona-lhe RAM virtual extra para não lhe falte fluidez na execução de qualquer tarefa.\r\n\r\nSEGURANÇA AO MAIS ALTO NÍVEL\r\nIntegrado no hardware e software desde o inicio, o Samsung Knox protege o seu smartphone desde o momento que o liga, para que toda a sua informação sensível esteja protegida.\r\n\r\nEXPERIÊNCIA DE VISUALIZAÇÃO\r\nExpanda a sua visão com uma ecrã de 6.6” com tecnologia Full HD+ e uma taxa de atualização de 120Hz para um scroll super fluido.\r\n\r\nTRIPLE CAMERA PARA TODOS OS MOMENTOS\r\nPara que as suas fotos tenham sempre o maior detalhe e definição, o Galaxy M23 5G vem com uma câmara principal de 50MP. A câmara ultra grande-angular de 8MP com um ângulo de 123° permite-lhe captar mais do mundo que o rodeia, tal como o olho humano. Com a câmara macro de 2MP os seus close-ups terão uma alta definição. Seja o centro das atenções com a câmara frontal de 8MP e o efeito bokeh.\r\n\r\nBATERIA PARA TODO O DIA\r\nA bateria de 5,000mAh dá-lhe a possibilidade de desfrutar do seu Galaxy M23 5G a qualquer hora do dia. E se ficar sem bateria, basta apenas ligar o seu carregador Super Fast Charging de 25W.\r\n\r\nEspecificações:\r\nOperador: Livre\r\nDual SIM: Dual SIM (Nano-SIM, dual stand-by)\r\nTipo de SIM: Nano SIM\r\nRede: 5G\r\nSistema Operativo: Android 12\r\nChipset: Qualcomm Snapdragon 750G\r\nProcessador: Octa-core até 2.2 GHz\r\nGPU: Adreno 619\r\nArmazenamento: 128GB (espaço utilizável será inferior) - expansível via microSD até 1TB\r\nMemória RAM: 4GB\r\nEcrã:\r\nTipo: TFT Infinity-V Display, 120Hz\r\nTamanho: 6.6\", 104.9 cm2 (~82.3% screen-to-body ratio)\r\nResolução: 1080 x 2408 pixels, 20:9 ratio (~400 ppi)\r\nCâmaras Traseiras:\r\n50 MP, f/1.8, (wide), PDAF\r\n8 MP, f/2.2, (ultrawide), 1/4\", 1.12µm\r\n2 MP, f/2.4, (depth)\r\nCâmaras Frontais:\r\n8 MP, f/2.2, (wide)\r\nDados:\r\nWLAN: Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot\r\nBluetooth: 5.0, A2DP, LE\r\nUSB: USB Type-C 2.0\r\nSensores: Impressão digital (montado na lateral), acelerómetro, giroscópio, proximidade, bússola\r\nGPS: A-GPS, GLONASS, GALILEO, BDS\r\nBateria: Não removível Li-Po 5000 mAh, carregamento rápido 25W\r\nDimensões do produto: 165.5 x 77 x 8.4 mm\r\nPeso do produto: 198 g', 1, 5, 0, NULL, 1),
(6, 'Apple iPhone 14 6.1', 'Apple', 'iPhone14MeiaNoite256GB.jpg', 1169.99, '', '', '<p>iPhone 14. Com o sistema de c&acirc;mara dupla mais impressionante de sempre no iPhone. Fotografias espetaculares em ambientes com pouca ou muitaluz. Dete&ccedil;&atilde;o de acidente, uma nova funcionalidade de seguran&ccedil;a que pede ajuda por si sempre que n&atilde;o o conseguir fazer. Caracter&iacute;sticas principais: Ecr&atilde; Super Retina XDR de 6.1 polegadas Sistema de c&acirc;mara avan&ccedil;ado para fotos perfeitas em qualquer luz ambiente Modo Cinematogr&aacute;fico agora em 4K Dolby Vision at&eacute; 30fps Modo A&ccedil;&atilde;o para gravar v&iacute;deos mais suaves com a c&acirc;mara &agrave; m&atilde;o Tecnologia de seguran&ccedil;a vital: Dete&ccedil;&atilde;o de acidente1 que pede ajuda sempre que n&atilde;o o conseguir fazer Bateria para todo o dia e at&eacute; 20 horas de v&iacute;deo3 Processador A15 Bionic com GPU 5-core para um desempenho ultrarr&aacute;pido. Rede m&oacute;vel 5G ultrarr&aacute;pida4 Caracter&iacute;sticas de durabilidade l&iacute;deres do setor com Ceramic Shield e resist&ecirc;ncia &agrave; &aacute;gua5 iOS 16 com ainda mais op&ccedil;&otilde;es para personalizar, comunicar e partilhar6 Especifica&ccedil;&otilde;es: Operador: Livre Dual SIM: Sim, Dual SIM e Dual eSIM (nano‑SIM e eSIM) Sistema Operativo: Apple iOS Processador: Processador A15 Bionic Nova CPU 6‑core com 2 n&uacute;cleos de desempenho e 4 n&uacute;cleos de efici&ecirc;ncia Nova GPU 4‑core Novo Neural Engine 16-core Armazenamento: 256GB Ecr&atilde;: Ecr&atilde; Super Retina XDR Ecr&atilde; OLED integral de 6,1 polegadas (diagonal) Resolu&ccedil;&atilde;o de 2532x1170 p&iacute;xeis a 460 ppp C&acirc;mara: Sistema de c&acirc;mara dupla Principal de 12 MP: 26 mm, abertura de &fnof;/1,5, estabiliza&ccedil;&atilde;o &oacute;tica de imagem com movimento do sensor, lente de sete elementos Ultra grande angular de 12 MP: 13 mm, abertura de &fnof;/2,4 e campo de vis&atilde;o de 120&deg;, lente de cinco elementos Zoom &oacute;tico a 2x para afastar; zoom digital at&eacute; 5x Cobertura da objetiva em cristal de safira Flash True Tone Photonic Engine Deep Fusion HDR inteligente 4 Modo Retrato com efeito bokeh (fundo desfocado) avan&ccedil;ado e Controlo da Profundidade Ilumina&ccedil;&atilde;o de Retrato com seis efeitos (Natural, Est&uacute;dio, Contorno, Palco, Palco Mono e High‑Key Mono) Modo Noite Foto&shy;grafias panor&acirc;micas (at&eacute; 63 MP) Estilos fotogr&aacute;ficos Foto&shy;grafias e Live Photos com vasta gama de cores Corre&ccedil;&atilde;o da objetiva (Ultra grande angular) Corre&ccedil;&atilde;o avan&ccedil;ada de olhos vermelhos Estabiliza&ccedil;&atilde;o de imagem autom&aacute;tica Modo cont&iacute;nuo Geolocaliza&ccedil;&atilde;o de fotografias Formatos de imagem captados: HEIF e JPEG Grava&ccedil;&atilde;o de v&iacute;deo: Grava&ccedil;&atilde;o de v&iacute;deo em 4K a 24, 25, 30 ou 60 fps Grava&ccedil;&atilde;o de v&iacute;deo em 1080p HD a 25, 30 ou 60 fps Grava&ccedil;&atilde;o de v&iacute;deo em 720p HD a 30 fps Modo Cinematogr&aacute;fico at&eacute; 4K HDR a 30 fps Modo A&ccedil;&atilde;o at&eacute; 2,8K a 60 fps Grava&ccedil;&atilde;o de v&iacute;deo em HDR com Dolby Vision at&eacute; 4K a 60 fps Compati&shy;bilidade com v&iacute;deo em c&acirc;mara lenta para 1080p a 120 ou 240 fps V&iacute;deo time‑lapse com estabiliza&ccedil;&atilde;o Time‑lapse no modo Noite V&iacute;deo QuickTake Estabiliza&ccedil;&atilde;o &oacute;tica de imagem com movimento do sensor para v&iacute;deo (Principal) Zoom &oacute;tico a 2x para afastar Zoom digital at&eacute; 3x Zoom de &aacute;udio Flash True Tone Estabiliza&ccedil;&atilde;o de v&iacute;deo cinematogr&aacute;fica (4K, 1080p e 720p) V&iacute;deo com focagem autom&aacute;tica cont&iacute;nua Foto&shy;grafias de 8 MP e v&iacute;deo 4K em simult&acirc;neo Zoom durante o v&iacute;deo Formatos de v&iacute;deo gravados: HEVC e H.264 Grava&ccedil;&atilde;o em est&eacute;reo C&acirc;mara TrueDepth: C&acirc;mara de 12 MP Abertura de &fnof;/1,9 Focagem autom&aacute;tica com Focus Pixels Lente de seis elementos Retina Flash Photonic Engine Deep Fusion HDR inteligente 4 Modo Retrato com efeito bokeh (fundo desfocado) avan&ccedil;ado e Controlo da Profundidade Ilumina&ccedil;&atilde;o de Retrato com seis efeitos (Natural, Est&uacute;dio, Contorno, Palco, Palco Mono e High‑Key Mono) Animoji e Memoji Modo Noite Estilos fotogr&aacute;ficos Foto&shy;grafias e Live Photos com vasta gama de cores Corre&ccedil;&atilde;o da objetiva Estabiliza&ccedil;&atilde;o de imagem autom&aacute;tica Modo cont&iacute;nuo Grava&ccedil;&atilde;o de v&iacute;deo em 4K a 24, 25, 30 ou 60 fps Grava&ccedil;&atilde;o de v&iacute;deo em 1080p HD a 25, 30 ou 60 fps Modo Cinematogr&aacute;fico at&eacute; 4K HDR a 30 fps Grava&ccedil;&atilde;o de v&iacute;deo em HDR com Dolby Vision at&eacute; 4K a 60 fps Compat&iacute;vel com v&iacute;deo em c&acirc;mara lenta para 1080p a 120 fps V&iacute;deo time‑lapse com estabiliza&ccedil;&atilde;o Time‑lapse no modo Noite V&iacute;deo QuickTake Estabiliza&ccedil;&atilde;o de v&iacute;deo cinematogr&aacute;fica (4K, 1080p e 720p) Face ID: Ativado pela c&acirc;mara TrueDepth para reconhecimento facial V&iacute;deo: Os formatos compat&iacute;veis incluem HEVC, H.264 e ProRes HDR com Dolby Vision, HDR10 e HLG AirPlay at&eacute; 4K HDR para proje&ccedil;&atilde;o e transmiss&atilde;o de fotografias e v&iacute;deo para a Apple TV (2.&ordf; gera&ccedil;&atilde;o ou posterior) ou uma smart TV compat&iacute;vel com AirPlay 2 Compati&shy;bilidade com proje&ccedil;&atilde;o e sa&iacute;da de v&iacute;deo: at&eacute; 1080p atrav&eacute;s do Adaptador Lightning para AV digital e Adaptador Lightning para VGA (adaptadores vendidos &agrave; parte) Rede m&oacute;vel sem fios: 5G (sub-6 GHz) com tecnologia MIMO 4x44 LTE Gigabit com tecnologia MIMO 4x4 e LAA4 Wi‑Fi 6 (802.11ax) com tecnologia MIMO 2x2 Bluetooth 5.3 Processador de ultra banda larga para reconhecimento espacial5 NFC com modo de leitor Placas Express com reserva de bateria Localiza&ccedil;&atilde;o: GPS, GLONASS, Galileo, QZSS e BeiDou B&uacute;ssola digital Wi‑Fi Rede m&oacute;vel Microlocaliza&ccedil;&atilde;o iBeacon Sensores: Face ID Bar&oacute;metro Girosc&oacute;pio de grande amplitude din&acirc;mica Aceler&oacute;metro de alta for&ccedil;a G Sensor de proximidade Sensor de luz ambiente duplo Dimens&otilde;es: 146.7 x 71.5 x 7.8 mm Peso: 172 g Conte&uacute;do da Embalagem: iPhone Cabo USB‑C para Lightning (n&atilde;o inclui carregador) Documenta&ccedil;&atilde;o</p>', 5, 6, 0, 1, 1),
(7, 'MSI MAG Codex 5 12TC-1478ES', 'MSI', 'MsiMAGCodex5_12TC_1478ES.jpg', 979.99, '', '', 'O computador MSI MAG Codex 5 12TC-1478ES foi projetado para gamers, possui processador Intel® Core™ i5-12400F e placa gráfica NVIDIA GeForce RTX, proporcionando a melhor experiência gaming. A solução térmica exclusiva com a melhor refrigeração, oferece o melhor desempenho, enquanto que a iluminação RGB e uma janela lateral com vidro temperado mostram o seu estilo. A série MSI MAG vai levar os gamers a quebrar barreiras.\r\n\r\n \r\n\r\n \r\n\r\nProcessador: Intel® Core™ i5-12400F Hexa-Core, 2.50 GHz com turbo até 4.40 GHz, 18 MB Cache\r\nSistema Operativo:\r\nSistema Operativo não incluído\r\nPoderá adquirir aqui o seu Sistema Operativo\r\nArmazenamento: SSD M.2 2280 512GB PCIe GEN3x4 NVMe + HDD 3.5\" 1TB 7200RPM\r\nChipset: Intel H610\r\nDrive Óptica: Não incluída\r\nPlaca Gráfica: MSI GeForce RTX 3060 VENTUS 2X 12G\r\nMemória RAM:\r\n16GB (1x16GB) DDR4-3200MHz\r\n2 x Slots U-DIMM (1 x livre / 1 x ocupado) p/ expansibilidade total até 64GB\r\nPortas I/O Frontais:\r\n1 x USB 3.2 Gen 1 Type C\r\n2 x USB 2.0 Type A\r\n1 x Audio Mic-in\r\n1 x Audio Headphone-out\r\nPortas I/O Traseiras:\r\n2 x USB 3.2 Gen 1 Type A\r\n4 x USB 2.0 Type A\r\n1 x RJ45\r\n1 x VGA\r\n1 x Saída HDMI 1.4\r\n1 x Entrada HDMI 1.2\r\nAudio Jacks\r\nComunicações Wireless:\r\nWireless Intel I219-V\r\nBluetooth 5.2\r\nFonte de alimentação: 500W\r\nDimensões do produto: 195mm x 514.8mm x 466mm\r\nPeso do produto: 12,4 kg', 8, 7, 1, 30, 0),
(8, 'LG UltraGear 27GN60R-B IPS 27\" FHD 16:9 144Hz', 'LG', 'LgUltraGear27GN60R_B.jpg', 299.99, '', '', 'MUDA O JOGO\r\nLG UltraGear ™, equipamento extremamente poderoso, aumenta as suas chances de vitória.\r\n\r\nCONCEBIDO PARA MAIOR VELOCIDADE\r\nCom o IPS 1 ms comparável à Velocidade TN, com persistência de imagem minimizada e um rápido tempo de resposta, poderá desfrutar de um novo desempenho de jogo.\r\n\r\nREFRESH RATE DE 144HZ - MOVIMENTO DE JOGO FLUÍDO\r\nUma velocidade ultrarrápida de 144 Hz permite aos jogadores ver o fotograma seguinte rapidamente e faz com que as imagens tenham uma aparência mais suave. Os jogadores podem responder rapidamente aos adversários e apontar com facilidade para os alvos.\r\n\r\nHDR10 COM SRGB 99% (TÍP) - VIVA O JOGO MAIS INTENSAMENTE COM TRUE COLOR\r\nEste monitor suporta HDR10 com sRGB 99% (Tip.) permitindo uma imersão visual realista com contraste e cores de grande riqueza. Independentemente do campo de batalha, poderá ajudar os jogadores a ver as cores dramáticas pretendidas pelos criadores do jogo.\r\n\r\nAMD FREESYNC™ PREMIUM - MAIOR NITIDEZ, SUAVIDADE E VELOCIDADE\r\nCom a tecnologia FreeSync ™ Premium, os jogadores podem experimentar movimentos fluidos e contínuos em jogos de alta resolução e em ritmo acelerado. Ele virtualmente minimiza a trepidação e a trepidação da tela.\r\n\r\nDESIGN ELEGANTE\r\nMelhore a sua experiência de jogo com um design atrativo e praticamente sem moldura. A base pode ser ajustada para alterar a inclinação do monitor, ajudando-o a jogar de forma mais confortável.\r\n\r\nDYNAMIC ACTION SYNC - MAIOR CAPACIDADE DE REAÇÃO\r\nReduza a latência de entrada com a Dynamic Action Sync para ajudar os jogadores a visualizarem momentos críticos em tempo real.\r\n\r\nBLACK STABILIZER - ATAQUE PRIMEIRO NA ESCURIDÃO\r\nBlack Stabilizer ajuda os jogadores a evitar que os atiradores se escondam nos lugares mais escuros e escapar rapidamente das situações quando o flash explode.\r\n\r\nCROSSHAIR - MELHOR PONTARIA\r\nO ponto alvo é fixado no centro para melhorar a precisão dos tiros.\r\n\r\n \r\n\r\nEcrã:\r\nDimensões (polegadas): 27 polegadas\r\nDimensões (cm): 68,5 cm\r\nResolução: 1920 x 1080\r\nTipo de painel: IPS\r\nRelação de aspeto: 16:9\r\nEspaçamento de píxeis: 0,2745 x 0,2745 mm\r\nBrilho (Mín.): 280 cd/m²\r\nBrilho (Tip.): 350 cd/m²\r\nGama de cores (Mín.): sRGB 95% (CIE1931)\r\nGama de cores (Tip.): sRGB 99% (CIE1931)\r\nProfundidade de cor (número de cores): 16.7M\r\nRelação de contraste (mín.): 700:1\r\nRelação de contraste (Tip.): 1000:1\r\nTempo de resposta: 1ms (GtG at Faster)\r\nTaxa de atualização: 144 Hz\r\nÂngulo de visualização (CR≥10): 178º(R/L), 178º(U/D)\r\nConectividade:\r\n1 x DisplayPort 1.2\r\n1 x HDMI 2.0\r\n1 x Jack 3.5mm\r\nSuporte HDCP\r\nConsumo Energético:\r\nTipo de adaptador: Adaptador de alimentação externo\r\nEntrada AC: 100~240 V 50/60 Hz\r\nConsumo energético (médio): 32 W\r\nConsumo energético (máx.): 34 W\r\nConsumo energético (Sleep Mode): Inferior a 0,5 W\r\nConsumo energético (CC Off): Inferior a 0,3 W\r\nDesign Mecânico:\r\nAjustes da posição do ecrã: Inclinação\r\nNorma VESA: 100 x 100 mm\r\nDimensões e Peso do Produto:\r\nDimensões com base (L x A x P): 614.2 x 454.2 x 224.8 mm\r\nDimensões sem base (L x A x P): 614.2 x 364.8 x 51.7 mm\r\nDimensões Embalagem (L x A x P): 707 x 453 x 164 mm\r\nPeso com base: 5,8 kg\r\nPeso sem base: 5,1 kg\r\nPeso Embalagem: 7,9 kg', 12, NULL, 1, 90, 0),
(12, 'Xiaomi Mi Gaming VA 34\" UWQHD 21:9 144Hz FreeSync', 'Xiaomi', 'p038185_2.jpg', 349.99, '', '', '<p><strong>VIS&Atilde;O PANOR&Acirc;MICA ULTRAWIDE 21:9<br></strong>A interface de jogo 21:9 oferece uma vis&atilde;o 30% mais ampla do que monitores 16:9 padr&atilde;o. Especialmente em jogos de estrat&eacute;gia em tempo real e de tiro em primeira pessoa, o campo de vis&atilde;o mais amplo permite que veja os desenvolvimentos do jogo primeiro, dando-lhe vantagem competitiva.</p>\r\n<p><strong>QUALIDADE DE IMAGEM ULTRA-ELEVADA AT&Eacute; NOS DETALHES<br></strong>A resolu&ccedil;&atilde;o de ultra-alta de 3440 x 1440 revela detalhes extremamente realistas em cada canto da cena, trazendo mundos de jogo espetaculares para a vida.</p>\r\n<p><strong>ALTO BRILHO E ALTA TAXA DE CONTRASTE QUE GERAM IMAGENS BRILHANTES E VIVAS<br></strong>Com brilho de at&eacute; 300 nits e alto contraste de 3000:1, o monitor exibe belas imagens n&iacute;tidas e v&iacute;vidas.</p>\r\n<p><strong>PAINEL COM CURVATURA 1500R<br></strong>O design de curvatura 1500R oferece imagem mais imersiva, para uma vis&atilde;o panor&acirc;mica envolvente. O painel curvo cria um &acirc;ngulo de inclina&ccedil;&atilde;o visual menor, de modo a que cada ponto no painel fica quase igualmente distante dos seus olhos, reduzindo distor&ccedil;&atilde;o visual e dando-lhe a si uma vis&atilde;o mais realista.</p>\r\n<p><strong>ELEVADA TAXA DE ATUALIZA&Ccedil;&Atilde;O DE 144HZ<br></strong>A alta taxa de atualiza&ccedil;&atilde;o de 144 Hz e o tempo de resposta de 4 ms reduzem efetivamente a intermit&ecirc;ncia e o ghosting nos jogos. Em jogos de tiro que exigem rea&ccedil;&otilde;es r&aacute;pidas, isso torna mais f&aacute;cil travar com precis&atilde;o e acertar no seu alvo quando a velocidade &eacute; a chave para a vit&oacute;ria.</p>\r\n<p><strong>TECNOLOGIA AMD FREESYNC<br></strong>A tecnologia AMD FreeSync Premium mant&eacute;m a imagem em sincronia com a entrada de alta taxa de frames, reduzindo falhas e cortes na imagem, para jogos mais uniformes que oferecem uma grande vantagem.</p>\r\n<p><strong>GAMA DE COR 121% SRGB<br></strong>O monitor pode exibir um m&aacute;ximo te&oacute;rico de 16,7 milh&otilde;es de cores e uma ampla gama de cores de at&eacute; 121% sRGB. O excelente desempenho de cores cria imagens realistas. Combinado com o painel panor&acirc;mico curvo 1500R, oferece uma experi&ecirc;ncia de entretenimento audiovisual mais envolvente.</p>\r\n<p><strong>MOLDURAS MAIS FINAS - UMA EXPERI&Ecirc;NCIA ENVOLVENTE<br></strong>A moldura fina de 2 mm n&atilde;o s&oacute; aumenta a propor&ccedil;&atilde;o tela-corpo, como tamb&eacute;m oferece molduras menos distrativas. A imagem ultra-ampla 21:9 tamb&eacute;m est&aacute; mais pr&oacute;xima das dimens&otilde;es do cinema.</p>\r\n<p><strong>AMPLA AJUSTABILIDADE<br></strong>Projetado com a sua sa&uacute;de em mente, o ajust&aacute;vel suporte do monitor n&atilde;o atende apenas &agrave;s necessidades profissionais de v&aacute;rias ocupa&ccedil;&otilde;es, mas tamb&eacute;m permite ajustar o &acirc;ngulo de vis&atilde;o para conforto ideal para efetivamente evitar tens&atilde;o no pesco&ccedil;o. Permite ajuste em altura, inclina&ccedil;&atilde;o e articula&ccedil;&atilde;o. Al&eacute;m de permitir instala&ccedil;&atilde;o na parede via norma VESA 100x100.</p>\r\n<ul>\r\n<li><strong>Ecr&atilde;:</strong>\r\n<ul>\r\n<li>Ecr&atilde;: 34\"</li>\r\n<li>Resolu&ccedil;&atilde;o: 3400 x 1440</li>\r\n<li>Brilho (cd/m&sup2;): 300 cd/m&sup2;</li>\r\n<li>Tempo de Resposta: 4 ms GTG</li>\r\n<li>Taxa de atualiza&ccedil;&atilde;o: 144Hz</li>\r\n<li>Tipo Painel: VA</li>\r\n<li>R&aacute;cio de Contraste (standard): 3000:1</li>\r\n<li>&Acirc;ngulo de Vis&atilde;o (CR &ge; 10): 178/178</li>\r\n<li>Tratamento superf&iacute;cie: Anti-Glare</li>\r\n<li>Reprodu&ccedil;&atilde;o de cores: 16.7 Milh&otilde;es de cores</li>\r\n<li><strong>Conectividade:</strong>\r\n<ul>\r\n<li>2x HDMI 2.0</li>\r\n<li>2x DisplayPort 1.4</li>\r\n<li>Suporte HDCP</li>\r\n</ul>\r\n</li>\r\n<li><strong>Ajustabilidade suporte:</strong>\r\n<ul>\r\n<li>Ajuste em inclina&ccedil;&atilde;o</li>\r\n<li>Ajuste em articula&ccedil;&atilde;o</li>\r\n<li>Ajuste em altura</li>\r\n</ul>\r\n</li>\r\n<li><strong>Dimens&otilde;es do produto:</strong>&nbsp;810 (L) x 242.5(W) x 520.6 (H) mm</li>\r\n</ul>\r\n</li>\r\n</ul>', 4, 12, 0, 0, 0),
(13, 'Asus Zenfone 9 5.9', 'Asus', '718-oyan-jl._ac_sl1500_.jpg', 829.99, '', '', '<p>O Zenfone 9 ultracompacto, ultraelegante e ultrarr&aacute;pido cabe perfeitamente na tua m&atilde;o, mas &eacute; extremamente potente gra&ccedil;as &agrave; plataforma m&oacute;vel premium Snapdragon&reg; 8+ Gen 1 e bateria de longa dura&ccedil;&atilde;o de 4300 mAh. O sistema de c&acirc;mara dupla massivamente atualizado inclui agora um estabilizador de gimbal h&iacute;brido de 6 eixos para fotos e v&iacute;deos super est&aacute;veis. Grandes possibilidades esperam por ti, pega j&aacute; no teu Zenfone 9 e segue!</p>\r\n<p><strong>COMPACTO PARA MANUSEAR</strong><br>O tamanho de Zenfone 9, de f&aacute;cil manuseamento e design leve, torna-se f&aacute;cil de usar para qualquer tarefa, em qualquer lugar.</p>\r\n<p><strong>DESBLOQUEIO SEM COMPLICA&Ccedil;&Otilde;ES</strong><br>Desbloqueia o teu Zenfone 9 tocando com o polegar no sensor convenientemente localizado no bot&atilde;o de energia no lado direito do telefone - &eacute; t&atilde;o simples quanto isso. Com apenas um toque, est&aacute;s dentro! Banimos as complica&ccedil;&otilde;es!</p>\r\n<p><strong>UMA M&Atilde;O PARA O M&Aacute;XIMO</strong><br>O bot&atilde;o multifun&ccedil;&otilde;es ZenTouch torna tudo mais f&aacute;cil - com apenas uma m&atilde;o! Usa o teu polegar para deslizar para cima, deslizar para baixo ou fazer duplo clique para diferentes fun&ccedil;&otilde;es incluindo voz para texto, abrir notifica&ccedil;&otilde;es, atualizar uma p&aacute;gina web, mover para o topo/fundo da p&aacute;gina, e controlo multim&eacute;dia.</p>\r\n<p><strong>GRANDE NA PERSONALIDADE</strong><br>Cri&aacute;mos quatro cores novas e apelativas para o Zenfone 9. E n&atilde;o s&oacute; fica bem, como tamb&eacute;m causa uma boa sensa&ccedil;&atilde;o, gra&ccedil;as a um material de superf&iacute;cie texturizado rec&eacute;m-desenvolvido que &eacute; realmente duro, mas muito aderente!</p>\r\n<p><strong>GRANDE NA RESIST&Ecirc;NCIA &Agrave; &Aacute;GUA</strong><br>A resist&ecirc;ncia &agrave; &aacute;gua IP68 significa que o Zenfone 9 lida bem cos salpicos ocasionais inesperados e permite-te desfrutares da tua vida di&aacute;ria ao m&aacute;ximo!1</p>\r\n<p><strong>GRANDE NA PERFORMANCE</strong><br>&Eacute; compacto, mas &eacute; incrivelmente potente! O Zenfone 9 usa a plataforma m&oacute;vel principal Snapdragon&reg; 8+ Gen 1 para lhe proporcionar uma performance suave e responsiva, independentemente do que estiveres a fazer.</p>\r\n<p><strong>GRANDE EM ARREFECIMENTO</strong><br>O Zenfone 9 funciona mais fresco - e mais r&aacute;pido - do que nunca, com um sistema de arrefecimento totalmente renovado. Usa agora uma c&acirc;mara de vapor de alta tecnologia em vez de heatpipes, e um dissipador de calor avan&ccedil;ado usa cobre, folhas de grafite e pasta t&eacute;rmica. Tem o dobro do tamanho e oferece uma capacidade de arrefecimento muito superior3. O resultado? Mais velocidade, menos calor!</p>\r\n<p><strong>AMPLA CAPACIDADE DA BATERIA</strong><br>Com uma bateria atualizada de 4300 mAh e componentes eficientes, o Zenfone 9 dura mais do que nunca!</p>\r\n<p><strong>GRANDE NA FOTOGRAFIA</strong><br>O Zenfone 9 tem uma m&aacute;quina fotogr&aacute;fica principal Sony&reg; IMX766, que te permite tirar fotografias perfeitas mesmo nos locais mais escuros. Capta cada momento, onde quer que estejas!</p>\r\n<p><strong>GRANDE EM NITIDEZ</strong><br>O Zenfone 9 est&aacute; repleto da mais recente tecnologia para te proporcionar as fotografias e v&iacute;deos mais n&iacute;tidos poss&iacute;veis. O novo Estabilizador de Gimbal H&iacute;brido de 6 Eixos mant&eacute;m tudo sem desfocagem nem aban&otilde;es, mesmo se te estiveres a mover! Combinado com tecnologia autofocus e novos algoritmos, podes confiar no Zenfone 9 para te proporcionar imagens de a&ccedil;&atilde;o supersuaves e de aspeto profissional, qualquer que seja o assunto!</p>\r\n<p><strong>GRANDE EM CARACTER&Iacute;STICAS PROFISSIONAIS</strong><br>Disp&otilde;e de um modo Light Trail9 para al&eacute;m dos modos Night, Pro, Panorama, Slow Motion e Timelapse, para que possas ter a certeza que captas fotos e v&iacute;deos perfeitos em quaisquer condi&ccedil;&otilde;es.</p>\r\n<p><strong>GRANDE NA VIS&Atilde;O</strong><br>O Zenfone 9 tem um ecr&atilde; AMOLED avan&ccedil;ado que fornece cores de classe cinematogr&aacute;fica de alta precis&atilde;o. Assistir aos v&iacute;deos do Zenfone 9, &eacute; como ver um filme no cinema!</p>\r\n<p><strong>GRANDE NO SOM</strong><br>Projetado com a ajuda dos especialistas em &aacute;udio da Dirac, o Zenfone 9 maximiza o volume e a qualidade do som percebidos dos seus altifalantes est&eacute;reo duplos. &Eacute; perfeito para v&iacute;deos e jogos envolventes!</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>Operador:</strong>&nbsp;Livre</li>\r\n<li><strong>Dual SIM:</strong>&nbsp;Dual SIM (Nano-SIM, dual stand-by)</li>\r\n<li><strong>Tipo de SIM:&nbsp;</strong>Nano SIM</li>\r\n<li><strong>Rede:</strong>&nbsp;5G</li>\r\n<li><strong>Sistema Operativo:&nbsp;</strong>Android 12</li>\r\n<li><strong>Chipset:&nbsp;</strong>Qualcomm SM8475 Snapdragon 8+ Gen 1 (4 nm)</li>\r\n<li><strong>Processador:</strong>&nbsp;Octa-core (1x3.19 GHz Cortex-X2 &amp; 3x2.75 GHz Cortex-A710 &amp; 4x1.80 GHz Cortex-A510)</li>\r\n<li><strong>GPU:&nbsp;</strong>Adreno 730</li>\r\n<li><strong>Armazenamento:</strong>&nbsp;128GB (espa&ccedil;o utiliz&aacute;vel ser&aacute; inferior) - n&atilde;o expans&iacute;vel via microSD</li>\r\n<li><strong>Mem&oacute;ria RAM:&nbsp;</strong>8GB</li>\r\n<li><strong>Ecr&atilde;:</strong>\r\n<ul>\r\n<li>Tipo: Super AMOLED, 120Hz, HDR10+, 1100 nits (peak)</li>\r\n<li>Tamanho: 1080 x 2400 pixels 5.9&nbsp;polegadas</li>\r\n<li>Prote&ccedil;&atilde;o: Corning Gorilla Glass Victus</li>\r\n</ul>\r\n</li>\r\n<li><strong>C&acirc;maras Traseiras:</strong>\r\n<ul>\r\n<li>Principal: 50 MP, f/1.9, 23.8mm (wide), 1/1.56\", 1.0&micro;m, PDAF, gimbal OIS</li>\r\n<li>Ultra Wide: 12 MP, f/2.2, 14.4mm, 113&deg; (ultrawide), 1/2.93\", 1.4&micro;m, AF</li>\r\n</ul>\r\n</li>\r\n<li><strong>C&acirc;maras Frontais:</strong>\r\n<ul>\r\n<li>Selfie: 12 MP, f/2.5, 27.5mm (standard), 1/2.93\", 1.22&micro;m, dual pixel PDAF</li>\r\n</ul>\r\n</li>\r\n<li><strong>Dados:</strong>\r\n<ul>\r\n<li>WLAN: Wi-Fi 802.11 a/b/g/n/ac/6e, dual-band, Wi-Fi Direct, DLNA, hotspot</li>\r\n<li>NFC: Sim</li>\r\n<li>Bluetooth: 5.2, A2DP, LE, aptX HD, aptX Adaptive, LDAC</li>\r\n<li>USB: USB Type-C, USB On-The-Go</li>\r\n</ul>\r\n</li>\r\n<li><strong>Sensores:&nbsp;</strong>Impress&atilde;o digital (montada na lateral), aceler&ocirc;metro, girosc&oacute;pio, proximidade, b&uacute;ssola</li>\r\n<li><strong>GPS:</strong>&nbsp;Sim, com A-GPS. At&eacute; dual-band: GLONASS, BDS, GALILEO, QZSS, NavIC</li>\r\n<li><strong>Bateria:</strong>&nbsp;N&atilde;o remov&iacute;vel Li-Pro 4300 mAh, carregamento r&aacute;pido 30W</li>\r\n<li><strong>Dimens&otilde;es do produto:&nbsp;</strong>146.5 x 68.1 x 9.1 mm</li>\r\n<li><strong>Peso do produto:</strong>&nbsp;169 g</li>\r\n</ul>', 6, NULL, 1, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilizadores`
--

DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE `utilizadores` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Passwd` varchar(255) NOT NULL,
  `Permissoes` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilizadores`
--

INSERT INTO `utilizadores` (`ID`, `Nome`, `Email`, `Passwd`, `Permissoes`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Admin', 1),
(4, 'Teste', 'teste@gmail.com', 'teste', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carateristicas`
--
ALTER TABLE `carateristicas`
  ADD PRIMARY KEY (`IdCategoria`),
  ADD UNIQUE KEY `ID_produto` (`IdProduto`),
  ADD UNIQUE KEY `Nome do Produto` (`NomeProduto`);

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Carateristicas` (`Carateristicas`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carateristicas`
--
ALTER TABLE `carateristicas`
  ADD CONSTRAINT `carateristicas_ibfk_1` FOREIGN KEY (`IdProduto`) REFERENCES `produtos` (`ID`);

--
-- Constraints for table `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`Carateristicas`) REFERENCES `carateristicas` (`IdCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
