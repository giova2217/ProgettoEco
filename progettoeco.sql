-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 03, 2024 alle 10:40
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progettoeco`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articles`
--

CREATE TABLE `articles` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `creation_date`, `image_path`, `approved`, `user_id`, `category_id`) VALUES
(7, 'Energia solare', 'L\'energia solare è una delle fonti di energia rinnovabile più promettenti e sostenibili a nostra disposizione. Derivata dalla luce del sole, questa energia può essere convertita in elettricità o calore utilizzabile attraverso tecnologie innovative. Il sole, una risorsa <b>inesauribile</b> e <b>gratuita</b>, offre un potenziale immenso per soddisfare le crescenti esigenze energetiche globali riducendo al contempo l\'impatto ambientale.<br><br>\r\nUno dei metodi più diffusi per catturare l\'energia solare è l\'utilizzo dei pannelli fotovoltaici. Questi dispositivi, composti da celle solari che convertono la luce solare direttamente in elettricità, hanno fatto enormi progressi negli ultimi anni. Grazie a miglioramenti nella tecnologia e alla riduzione dei costi, i pannelli fotovoltaici sono diventati sempre più <b>efficienti</b> ed <b>economicamente vantaggiosi</b>, rendendo l\'energia solare competitiva rispetto alle fonti tradizionali di energia.<br><br>\r\nL\'energia solare non si limita alla produzione di elettricità. I collettori solari termici, ad esempio, sono utilizzati per riscaldare acqua e ambienti, offrendo un\'alternativa ecologica ai sistemi di riscaldamento convenzionali. Inoltre, l\'energia solare può essere impiegata in una vasta gamma di contesti, dai piccoli impianti domestici agli impianti solari su larga scala, che forniscono energia alle reti elettriche nazionali.<br><br>\r\nOltre a ridurre le <b>emissioni di gas serra</b> e l\'<b>impatto ambientale complessivo</b>, l\'energia solare offre una serie di vantaggi economici. L\'abbondanza di luce solare in molte regioni del mondo consente la produzione di energia locale, riducendo la dipendenza dalle fonti energetiche fossili e dai costi associati al trasporto e alla distribuzione dell\'energia. Inoltre, l\'industria solare <b>crea posti di lavoro</b> e stimola l\'innovazione tecnologica, contribuendo alla crescita economica e al benessere delle comunità.<br><br>\r\nNonostante i numerosi vantaggi, l\'adozione diffusa dell\'energia solare presenta ancora alcune sfide. La <b>variabilità della luce solare</b> e la necessità di sviluppare <b>infrastrutture di stoccaggio dell\'energia</b> sono questioni importanti da affrontare. Tuttavia, con investimenti continuativi in ricerca e sviluppo e politiche pubbliche favorevoli, queste sfide possono essere superate, aprendo la strada a un futuro in cui l\'energia solare gioca un ruolo centrale nel soddisfare le esigenze energetiche globali in modo sostenibile e responsabile.<br><br>\r\nIn conclusione, l\'energia solare rappresenta una risorsa inesauribile e sostenibile che ha il potenziale per <b>trasformare</b> il nostro modo di produrre e consumare energia. Sfruttare appieno questo potenziale richiede impegno e collaborazione da parte di governi, industrie e individui, ma i benefici per l\'ambiente, l\'economia e la società nel loro complesso rendono tale sforzo assolutamente fondamentale.', '2024-05-28 19:17:58', '../assets/images/uploads/energia_solare.jpg', 1, 1, 1),
(19, 'Le implicazioni distruttive del disboscamento', '<b>Il disboscamento</b>, o abbattimento degli alberi, rappresenta una delle minacce più gravi e immediate per gli ecosistemi terrestri. Questo fenomeno, causato principalmente dall\'espansione agricola, dall\'industria del legno e dall\'urbanizzazione, comporta una serie di effetti devastanti sull\'ambiente, sulla biodiversità e sulle comunità umane. In questo articolo, esploreremo le cause, le conseguenze e le possibili soluzioni per contrastare il disboscamento, promuovendo un futuro più sostenibile.<br /><br />\r\n\r\nIl disboscamento avviene per diverse ragioni, molte delle quali sono legate alla crescita economica e all\'aumento della popolazione. Tra le cause principali troviamo:<br /><br />\r\n\r\n<b>Agricoltura su larga scala:</b> La conversione delle foreste in terreni agricoli per coltivazioni intensive, come la soia e l\'olio di palma, è una delle principali cause di disboscamento, specialmente nelle regioni tropicali.<br /><br />\r\n\r\n<b>Allevamento di bestiame:</b> La necessità di nuovi pascoli per l\'allevamento di bestiame porta alla deforestazione di vaste aree di foresta, contribuendo ulteriormente alla perdita di copertura forestale.<br /><br />\r\n\r\n<b>Industria del legno:</b> Il taglio degli alberi per la produzione di legname, carta e altri prodotti forestali continua a essere una causa significativa di disboscamento, spesso praticata in modo insostenibile.<br /><br />\r\n\r\n<b>Espansione urbana e infrastrutturale:</b> La crescita delle città e la costruzione di strade, dighe e altre infrastrutture richiedono l\'abbattimento di foreste per fare spazio a nuovi sviluppi.<br /><br />\r\n\r\nIl disboscamento ha conseguenze profonde e spesso irreversibili sull\'ambiente e sulla società. Tra le più rilevanti troviamo:<br /><br />\r\n\r\n<b>Perdita di biodiversità:</b> Le foreste ospitano un\'ampia varietà di specie animali e vegetali. La distruzione degli habitat forestali porta alla perdita di biodiversità, con molte specie che rischiano l\'estinzione.<br /><br />\r\n\r\n<b>Cambiamento climatico:</b> Le foreste svolgono un ruolo cruciale nell\'assorbire il carbonio atmosferico. Il disboscamento aumenta le emissioni di gas serra, contribuendo al riscaldamento globale.<br /><br />\r\n\r\n<b>Erosione del suolo:</b> Senza la copertura forestale, i terreni sono più vulnerabili all\'erosione, che può portare alla perdita di suolo fertile e alla degradazione del territorio.<br /><br />\r\n\r\n<b>Alterazione dei cicli idrologici:</b> Le foreste influenzano il ciclo dell\'acqua, contribuendo alla regolazione delle precipitazioni e alla conservazione delle risorse idriche. Il disboscamento può alterare questi cicli, causando siccità o inondazioni.<br /><br />\r\n\r\n<b>Impatto sulle comunità indigene:</b> Molte comunità indigene dipendono dalle foreste per il loro sostentamento e la loro cultura. Il disboscamento minaccia i loro mezzi di sussistenza e i loro diritti territoriali.<br /><br />\r\n\r\nAffrontare il disboscamento richiede un approccio integrato che coinvolga governi, industrie e società civile. Alcune delle strategie più efficaci includono:<br /><br />\r\n\r\n<b>Politiche di conservazione:</b> Implementare leggi e regolamenti che proteggano le foreste e incentivino pratiche di gestione sostenibile delle risorse forestali.<br /><br />\r\n\r\n<b>Riforestazione e rimboschimento:</b> Promuovere programmi di riforestazione e rimboschimento per ripristinare le aree degradate e aumentare la copertura forestale.<br /><br />\r\n\r\n<b>Agricoltura sostenibile:</b> Adottare pratiche agricole sostenibili che riducano la necessità di espandere i terreni coltivabili a discapito delle foreste.<br /><br />\r\n\r\n<b>Certificazione forestale:</b> Sostenere iniziative di certificazione forestale, come il Forest Stewardship Council (FSC), che garantiscono la provenienza sostenibile dei prodotti forestali.<br /><br />\r\n\r\n<b>Educazione e sensibilizzazione:</b> Educare il pubblico sull\'importanza delle foreste e coinvolgere le comunità locali nella gestione e conservazione delle risorse forestali.<br /><br />\r\n\r\n<b>Incentivi economici:</b> Offrire incentivi economici per la conservazione delle foreste, come pagamenti per i servizi ecosistemici, che ricompensano i proprietari terrieri per la protezione delle foreste.<br /><br />\r\n\r\nIl disboscamento è una sfida globale che richiede un impegno collettivo per essere affrontata efficacemente. Proteggere le foreste non solo preserva la biodiversità e mitiga il cambiamento climatico, ma sostiene anche le comunità locali e promuove uno sviluppo sostenibile. È essenziale che governi, aziende e cittadini lavorino insieme per implementare soluzioni che bilancino le esigenze economiche con la necessità di conservare le risorse naturali per le generazioni future. Solo attraverso azioni concertate e responsabili possiamo sperare di invertire la tendenza del disboscamento e garantire un pianeta sano e vitale per tutti.', '2024-05-29 19:07:32', '../assets/images/uploads/disboscamento.jpg', 1, 2, 2),
(20, 'Il potere trasformativo del riciclaggio', 'Il riciclaggio è molto più di un\'azione; è un potente strumento di trasformazione che può rivoluzionare il nostro modo di consumare e di interagire con il mondo che ci circonda. Questo processo, attraverso il quale i materiali vengono raccolti, trasformati e riutilizzati, ha il potenziale non solo di ridurre i rifiuti e l\'inquinamento, ma anche di promuovere uno stile di vita più sostenibile e responsabile.<br /><br />\r\n\r\nIl <b>potere trasformativo</b> del riciclaggio si manifesta su diversi livelli. In primo luogo, contribuisce a preservare le risorse naturali, riducendo la necessità di estrarre nuove materie prime. Quando ricicli una bottiglia di plastica o una lattina di alluminio, stai in realtà contribuendo a conservare energia e risorse idriche che altrimenti sarebbero impiegate per produrre nuovi materiali. Questo non solo aiuta a preservare l\'ambiente, ma anche a ridurre l\'impatto delle attività estrattive sull\'ecosistema.<br /><br />\r\n\r\nIn secondo luogo, il riciclaggio è un catalizzatore per l\'innovazione e lo sviluppo tecnologico. Le industrie del riciclaggio sono costantemente alla ricerca di nuovi metodi e tecnologie per migliorare l\'efficienza del processo di riciclaggio e per trovare nuovi usi per i materiali riciclati. Questo stimola l\'innovazione e l\'ingegnosità, portando alla creazione di nuove soluzioni e opportunità nel settore ambientale e industriale.<br /><br />\r\n\r\n<b>Riduzione dell\'impronta ecologica</b> è un altro aspetto cruciale del riciclaggio. Riducendo la quantità di rifiuti destinati alle discariche e agli inceneritori, il riciclaggio contribuisce a mitigare l\'inquinamento dell\'aria, del suolo e delle acque. Ciò è particolarmente importante in un\'epoca in cui i cambiamenti climatici e l\'inquinamento ambientale rappresentano gravi minacce per la salute del nostro pianeta e delle generazioni future.<br /><br />\r\n\r\nInoltre, il riciclaggio può avere un impatto significativo sulle economie locali e globali. Creando nuove opportunità di lavoro nel settore del riciclaggio e della gestione dei rifiuti, il riciclaggio aiuta a stimolare la crescita economica e a creare posti di lavoro sostenibili. Inoltre, riducendo la dipendenza dalle materie prime vergini e dai combustibili fossili, il riciclaggio può contribuire a stabilizzare i mercati delle materie prime e a ridurre la volatilità dei prezzi.<br /><br />\r\n\r\nInfine, il riciclaggio è un potente strumento di sensibilizzazione e di educazione ambientale. Promuovendo una cultura del riciclo e dell\'economia circolare, il riciclaggio incoraggia le persone a riflettere sulle proprie abitudini di consumo e sulle conseguenze dei propri comportamenti sull\'ambiente. Ci insegna a essere più consapevoli dei materiali che utilizziamo e delle modalità con cui li gestiamo, spingendoci a fare scelte più sostenibili e responsabili nel nostro quotidiano.<br /><br />\r\n\r\nIn conclusione, il riciclaggio non è solo una pratica ambientale; è un potente motore di cambiamento che può trasformare le nostre società, le nostre economie e il nostro pianeta per il meglio. Riconoscere e sfruttare appieno il potere trasformativo del riciclaggio è essenziale per affrontare le sfide ambientali e sociali che ci troviamo di fronte e per costruire un futuro più sostenibile e resiliente per tutti.', '2024-05-29 19:17:08', '../assets/images/uploads/natura.jpg', 1, 12, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'ENERGIA'),
(2, 'AMBIENTE'),
(3, 'RICICLAGGIO');

-- --------------------------------------------------------

--
-- Struttura della tabella `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `article_id` int(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `article_id`, `content`, `date`) VALUES
(15, 1, 20, 'Bell\'articolo!', '2024-05-30 18:51:16'),
(16, 12, 7, 'Grazie', '2024-05-30 18:53:48'),
(18, 12, 19, 'Wow', '2024-05-30 18:54:27'),
(19, 12, 20, 'Finalmente il mio primo articolo!', '2024-05-30 18:54:49'),
(20, 2, 20, 'Bravo', '2024-05-30 18:55:18'),
(21, 2, 7, 'Interessante', '2024-05-30 18:55:30'),
(22, 12, 20, 'Grazie a tutti!', '2024-05-30 19:05:18');

-- --------------------------------------------------------

--
-- Struttura della tabella `featured_articles`
--

CREATE TABLE `featured_articles` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `featured_articles`
--

INSERT INTO `featured_articles` (`id`, `article_id`) VALUES
(1, 7),
(2, 19),
(3, 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation_date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `creation_date`, `image`) VALUES
(1, 'admin', '$2y$10$IS5y4gAPBDrtB9HyWoZoZ.Ej1MN875ZZOnfNW/MDYHmTK6ozztVSe', '2024-05-26', NULL),
(2, 'marco25', '$2y$10$D1Hw0vEEyyNw15/W4aOHiOYxOlssjs0LJALTgJiVi1bFtUgzCglMO', '2024-05-26', NULL),
(12, 'mario', '$2y$10$7KdJasRPdKewzxZuswiHwuJlIAMUJEaEE7yyftoIEcxBoU0FxeggW', '2024-05-26', NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_scrittore` (`user_id`),
  ADD KEY `id_categoria` (`category_id`);

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_scrittore` (`user_id`),
  ADD KEY `id_articolo` (`article_id`);

--
-- Indici per le tabelle `featured_articles`
--
ALTER TABLE `featured_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_articles_ibfk_1` (`article_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT per la tabella `featured_articles`
--
ALTER TABLE `featured_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `featured_articles`
--
ALTER TABLE `featured_articles`
  ADD CONSTRAINT `featured_articles_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
