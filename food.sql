-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 28, 2021 alle 11:17
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id` int(11) NOT NULL,
  `ID_Cibo` int(11) NOT NULL,
  `ID_Utente` int(11) NOT NULL DEFAULT 0,
  `Prezzo_Cibo` float NOT NULL DEFAULT 0,
  `Nome_Cibo` varchar(255) NOT NULL DEFAULT '0',
  `Img_Cibo` varchar(255) NOT NULL DEFAULT '0',
  `Quantita` int(11) DEFAULT NULL,
  `Tot` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`id`, `ID_Cibo`, `ID_Utente`, `Prezzo_Cibo`, `Nome_Cibo`, `Img_Cibo`, `Quantita`, `Tot`) VALUES
(377, 2, 54, 5, 'Pizza', 'img/margherita.jpg', 1, 5),
(378, 3, 54, 2, 'Arancini', 'img/Arancini.jpg', 1, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `ID_Utente` int(11) NOT NULL,
  `Ricevuta_Pagamento` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Cellulare` varchar(255) DEFAULT NULL,
  `Indirizzo` varchar(255) DEFAULT NULL,
  `Provincia` varchar(255) DEFAULT NULL,
  `Proprietario_Carta` varchar(255) DEFAULT NULL,
  `Valuta` varchar(50) DEFAULT NULL,
  `Tot` float DEFAULT NULL,
  `Stato_Pagamento` varchar(255) DEFAULT NULL,
  `ID_Rider` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `checkout`
--

INSERT INTO `checkout` (`id`, `ID_Utente`, `Ricevuta_Pagamento`, `Email`, `Cellulare`, `Indirizzo`, `Provincia`, `Proprietario_Carta`, `Valuta`, `Tot`, `Stato_Pagamento`, `ID_Rider`) VALUES
(38, 54, 'ch_1J45EjB3KDsI1CNT67EsiQj2', 'camiololuxa991@gmail.com', '3333669897', 'Via Monte Bianco 7', 'CT', 'Luca Camiolo', 'EUR', 5, 'succeeded', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `contattaci`
--

CREATE TABLE `contattaci` (
  `id` int(11) NOT NULL,
  `ID_Utente` int(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Messaggio` varchar(255) DEFAULT NULL,
  `Dettagli` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `contattaci`
--

INSERT INTO `contattaci` (`id`, `ID_Utente`, `Email`, `Messaggio`, `Dettagli`) VALUES
(39, 54, 'ciao@libero.it', 'Ordine', 'Veramente ottimo'),
(46, 54, 'lexi@libero.it', 'grandi', 'perfetto');

-- --------------------------------------------------------

--
-- Struttura della tabella `immagini`
--

CREATE TABLE `immagini` (
  `id` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `immagini`
--

INSERT INTO `immagini` (`id`, `Nome`, `Img`) VALUES
(1, 'KFC', 'img/Kfc.png'),
(2, 'MC', 'img/Mc.png'),
(3, 'STARBUCKS', 'img/Starbucks.png'),
(4, 'CHIPOTLE', 'img/Chipotle.png'),
(5, 'BURGER KING', 'img/BK.png'),
(6, 'PIZZA HUT', 'img/Hut.png'),
(7, 'Carne', 'img/img1.jpg'),
(8, 'Pizza', 'img/Pizza.jpg'),
(9, 'Sushi', 'img/Sushi.jpg'),
(10, 'Hamburger', 'img/Hamburger.jpg'),
(11, 'Tacos', 'img/Tacos.jpg'),
(12, 'Lasagna', 'img/Lasagna.jpg'),
(13, 'Insalata', 'img/Insalata.jpg'),
(14, 'Gyoza', 'img/Gyoza.jpg'),
(15, 'Box', 'img/Friends.jpg'),
(16, 'Header', 'img/Delivery.jpg'),
(17, 'Footer', 'img/Footer.jpg'),
(18, 'Cart_Header', 'img/cart_header.jpg'),
(19, 'Delete', 'img/delete.png'),
(20, 'checkout', 'img/checkout_header.jpg'),
(21, 'Cart', 'img/cart.png'),
(23, 'Contattaci', 'img/contattaci.jpg'),
(24, 'Gif-Delivery', 'img/login-delivery.gif'),
(25, 'Food', 'img/login-delivery.jpg\r\n'),
(27, 'Order-Delivery', 'img/Order-Delivery.gif'),
(28, 'Food-Background', 'img/Food-Background.jpg'),
(30, 'Success', 'img/success.png'),
(31, 'BackProfile', 'img/BackProfile.jpg'),
(32, 'Empty', 'img/Empty.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `Tipo` varchar(255) DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Descrizione` varchar(255) DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `Img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `menu`
--

INSERT INTO `menu` (`id`, `Tipo`, `Nome`, `Descrizione`, `Costo`, `Img`) VALUES
(1, 'Italiano', 'Carbonara', 'La pasta alla carbonara è un piatto caratteristico del Lazio,e più in particolare di Roma, preparato con ingredienti popolari e dal gusto intenso. I tipi di pasta tradizionalmente più usati sono gli spaghetti e i rigatoni.', 8, 'img/carbonara.jpg'),
(2, 'Italiano', 'Pizza', 'La pizza è un prodotto che consiste in un impasto a base di farina, acqua e lievito che viene spianato e condito tipicamente con pomodoro, mozzarella e altri ingredienti e cotto in un forno a legna. Originario della cucina napoletana, è oggi, insieme alla', 5, 'img/margherita.jpg'),
(3, 'Italiano', 'Arancini', 'L\'arancino è una specialità della cucina siciliana.Si tratta di una palla o di un cono di riso impanato e fritto,farcito generalmente con ragù, piselli e caciocavallo, oppure dadini di prosciutto cotto e mozzarella.', 2, 'img/Arancini.jpg'),
(4, 'Italiano', 'Risotto allo zafferano', 'Il Risotto allo zafferano è un piatto tradizionale molto gustoso e profumato, tipico della cucina milanese! a base di riso, brodo vegetale e zafferano', 5, 'img/risotto.jpg'),
(5, 'Messicano', 'Tacos', 'I tacos sono una sorta di panino messicano che permette ripieni pressoché infiniti.Possono essere conditi con: Carne, cipolla, peperoncini, salsa piccante', 4, 'img/tacos2.jpg'),
(6, 'Messicano', 'Chilaquiles', 'I chilaquiles sono un classico piatto da colazione messicana e ovviamente ne esistono diverse versioni.I chilaquiles infatti possono essere corredati da pollo o uova, con l\'aggiunta di diversi tipi di peperoncino che ne cambiano notevolmente il sapore', 4, 'img/chilaquiles.jpg'),
(7, 'Messicano', 'Tortillas', 'La tortilla è un tipo di pane basso non lievitato, a base di farina di mais, tipico del Messico.Le tortilla di farina di grano non vengono consumate da sole ma sono la base per piatti tipici come tacos, quesadillas e burrito.', 3, 'img/tortillas.jpg'),
(8, 'Messicano', 'Tamales', 'I tamales sono un piatto tipico di alcune culture dell\'America Latina; sono degli involtini preparati tradizionalmente con un impasto a base di mais ripieno di carne, verdure, frutta o altri ingredienti; possono quindi essere salati o dolci a seconda degl', 5, 'img/tamales.jpg'),
(9, 'Giapponese', 'Ramen', 'Il ramen è un piatto giapponese, costituito da noodles di grano serviti in un brodo di carne o, talvolta, di pesce, spesso aromatizzato con salsa di soia, miso o shio.Esistono molte varianti vegetariane, in cui viene utilizzato un brodo vegetale e condime', 6, 'img/ramen.jpg'),
(10, 'Giapponese', 'Onigiri', 'Onigiri sono delle polpette a base di riso bianco di forma triangolare o cilindrica e spesso avvolti in alga nori.La maggior parte dei negozi giapponesi e konbini offre gli onigiri con vari ripieni e aromi.', 3, 'img/onigiri.jpg'),
(11, 'Giapponese', 'Sashimi', 'Il sashimi è un piatto della cucina giapponese che consiste principalmente in un carpaccio di pesce o molluschi freschissimi, ma talvolta anche carne, tagliato in fettine sottilissime.', 15, 'img/sashimi.jpg'),
(12, 'Giapponese', 'Nigiri', 'Il Nigiri è una pallina ovale di riso, modellata a mano, con una fettina di pesce sopra. Di solito si tratta di salmone, orata, tonno, anguilla, polpo, calamaro, granchio, gambero o anche di frittata.', 10, 'img/nigiri.jpg'),
(13, 'Cinese', 'Jiaozi', 'I Jiaozi sono dei ravioli di carne o ravioli al vapore molto popolare in Cina, Giappone e Corea. Ripieni di carne e/o verdura, sono avvolti con una sottile pasta sigillata con la pressione delle dita.', 6, 'img/gyoza2.jpg'),
(14, 'Cinese', 'Involtini Primavera', 'Gli involtini primavera sono un piatto tipico della cucina cinese, servito come antipasto e, in quei paesi dove è regolarmente consumato, fritto o fresco a scelta', 3, 'img/involtini_primavera.jpg'),
(15, 'Cinese', 'Spaghetti Di Riso', 'Gli spaghetti di riso con verdure sono uno sfizioso primo piatto, dal sapore orientale, che si prepara molto facilmente e con rapidità. Si tratta di una ricetta vegana, leggera ma saporita, che piace molto anche ai bambini. Così realizzati questi spaghett', 5, 'img/spaghetti_riso.jpg'),
(16, 'Cinese', 'Pollo alle mandorle', 'Il pollo alle mandorle è una ricetta molto apprezzata in tutto il mondo che non manca mai nel menù dei ristoranti cinesi! Come da tradizione, i bocconcini di pollo sono arricchiti con germogli di bambù e avvolti in una deliziosa cremina insaporita con sal', 7, 'img/pollo_mandorle.jpg'),
(17, 'Tedesco', 'Sauerbraten', 'Il sauerbraten è un tipo di stufato tedesco, in genere di carne bovina marinata e poi cotta in acqua, aceto e spezie.È tradizionalmente servito con cavolo rosso,grossi gnocchi di patate, Spätzle, patate lesse, o tagliatelle.', 12, 'img/Sauerbraten.jpg'),
(18, 'Tedesco', 'Brezel', 'Il Brezel è un tipo di pane molto popolare tra le popolazioni di origine teutonica, e quindi diffuso soprattutto in Germania.', 1, 'img/brezel.jpg'),
(19, 'Americano', 'Lobster Roll', 'Il lobster roll è uno dei panini più sfiziosi che potrete gustare negli Stati Uniti d’America.II concetto è semplice: è un hot dog con un’insalata di astice al posto del solito wurstel,nato nel Maine', 20, 'img/lobster.jpg'),
(20, 'Americano', 'Hamburger', 'Un hamburger perfetto all\'americana deve essere preparato con carne tritata di manzo, pomodori, cetrioli, cipolla, qualche foglia di lattuga e le immancabili salsine: ketchup e maionese, che possono essere sostituite eventualmente da senape.', 7, 'img/hamburger2.jpg'),
(21, 'Americano', 'Lime Pie', 'La lime pie è una torta originaria delle isole Keys della Florida dove esistono numerose piante di lime, piccoli limoni tondi, duri e dalla scorza di colore verde scuro.', 4, 'img/lime_pie.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `rider`
--

CREATE TABLE `rider` (
  `id` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `rider`
--

INSERT INTO `rider` (`id`, `Nome`) VALUES
(1, 'Andrea'),
(2, 'Giovanni'),
(3, 'Mirko'),
(4, 'Alessandra'),
(5, 'Martina');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `Username` varchar(16) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Cognome` varchar(255) DEFAULT NULL,
  `Pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `Username`, `Password`, `Email`, `Nome`, `Cognome`, `Pic`) VALUES
(54, 'kamill', '$2y$10$T0YIPmtztnTkcCG73/ja/uyywSkjp1GMvMSMJJrzIsf/HZTTPaBUe', 'Camiololuxa991@gmail.com', 'Luca', 'Camiolo', 'eren.gif'),
(58, 'Xion', '$2y$10$nvJSpHU.3NMUMPhi1F7w9.UdacnHoYE7Mgc3RMJMm0UJhnP.99S3.', 'andrea@gmail.com', 'Andrea', 'Alessandri', 'kamill.png');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ID_Cibo` (`ID_Cibo`),
  ADD KEY `ID_Utente` (`ID_Utente`);

--
-- Indici per le tabelle `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Utente` (`ID_Utente`),
  ADD KEY `Rider` (`ID_Rider`);

--
-- Indici per le tabelle `contattaci`
--
ALTER TABLE `contattaci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Utente` (`ID_Utente`);

--
-- Indici per le tabelle `immagini`
--
ALTER TABLE `immagini`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indici per le tabelle `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indici per le tabelle `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT per la tabella `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT per la tabella `contattaci`
--
ALTER TABLE `contattaci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT per la tabella `immagini`
--
ALTER TABLE `immagini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT per la tabella `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `rider`
--
ALTER TABLE `rider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `ciboo` FOREIGN KEY (`ID_Cibo`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utentee` FOREIGN KEY (`ID_Utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `rider` FOREIGN KEY (`ID_Rider`) REFERENCES `rider` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ute` FOREIGN KEY (`ID_Utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `contattaci`
--
ALTER TABLE `contattaci`
  ADD CONSTRAINT `contact_utente` FOREIGN KEY (`ID_Utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
