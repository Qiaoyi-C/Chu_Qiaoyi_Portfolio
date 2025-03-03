-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2025 年 03 月 03 日 22:54
-- 伺服器版本： 8.0.35
-- PHP 版本： 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `portfolio`
--

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'UI/UX Design'),
(2, 'Graphic design'),
(3, 'Video Editing'),
(4, 'Programming'),
(5, '3D Design');

-- --------------------------------------------------------

--
-- 資料表結構 `Contact`
--

CREATE TABLE `Contact` (
  `id` int UNSIGNED NOT NULL,
  `first_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Contact`
--

INSERT INTO `Contact` (`id`, `first_name`, `last_name`, `phone`, `email`, `message`, `date`) VALUES
(2, '12', '12', '12', '12@gmail.com', '123', '2024-12-06 22:36:21'),
(3, '12', '12', '1', '12@gmail.com', 'test', '2024-12-06 22:40:55'),
(4, '12', '12', '12', '12@gmail.com', '5432', '2024-12-06 22:41:45'),
(5, '12', '21', '12', '12@gmail.com', 'asd', '2024-12-06 22:47:27'),
(6, '321', '321', '321', '321@gmail.com', '321', '2024-12-06 22:59:06'),
(7, '123', '456489', '123456', '123@gmail.com', 'test0203', '2025-02-03 21:06:38');

-- --------------------------------------------------------

--
-- 資料表結構 `Media`
--

CREATE TABLE `Media` (
  `id` int UNSIGNED NOT NULL,
  `project_id` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `media_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `media_url` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `Project`
--

CREATE TABLE `Project` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` varchar(100) NOT NULL,
  `background` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `problem` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `solution` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `video` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_date` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Project`
--

INSERT INTO `Project` (`id`, `title`, `image`, `category`, `background`, `description`, `problem`, `solution`, `video`, `created_date`) VALUES
(1, 'Cyberuranus official website', 'project-01.png', 'UI/UX Design', 'Cyberuranus is committed to providing innovative blockchain transaction solutions, enabling businesses to seamlessly transition into the digital economy. Our platform combines intuitive UI design with high-performance architecture, helping users enhance transaction efficiency while reducing complexity. The Cyberuranus team consists of seasoned professionals with years of experience in software development and blockchain technology, dedicated to delivering industry-leading products. Our design not only reflects a sense of cutting-edge technology but also emphasizes user convenience, embracing the principle of “Technology for People.”', 'This design adopts orange-red as the primary color, paired with a soft gradient background to convey the vitality and innovation of a startup. The layout is clean and structured, featuring a clear visual hierarchy. The left side highlights the brand introduction and textual content, while the right side showcases the cross-platform capabilities of the product (desktop and mobile), emphasizing its practicality and modernity. The use of sans-serif fonts underscores the sense of technology and professionalism, and the thoughtful use of whitespace enhances readability and visual comfort. The device visuals on the right further emphasize the high-end image of the product, capturing the audience’s attention. This minimalist yet refined design effectively conveys the brand’s professionalism while highlighting the core value of the product.', 'When designing a website, startups face the following challenges: How to communicate their brand identity and product value in a simple yet intuitive way? Target users need to quickly understand the company’s core vision and product features, but overly complex designs may lead to a poor user experience. Additionally, balancing the presentation of technological sophistication, professionalism, and user-friendliness within limited screen space, while encouraging users to engage further with the brand, poses a significant design challenge.', 'To address the challenge of overly complex designs or ineffective communication of brand value, a clean information architecture was adopted to present the brand identity and product features in distinct sections, helping users quickly grasp key points. Additionally, device visuals on the right side were used to intuitively showcase the product’s cross-platform capabilities, enhancing technological sophistication and professionalism. The color scheme features orange-red to emphasize innovation and energy, paired with sans-serif fonts to enhance modernity and readability. Proper use of whitespace and visual hierarchy reduces clutter and improves user experience. Finally, clear call-to-action buttons (e.g., “Learn More” or “Try Now”) effectively guide users to further engage with the brand.', '', 'September, 2020'),
(2, 'Virtual Currency App', 'project-02.png', 'UI/UX Design', 'The cryptocurrency market continues to grow rapidly, with more users seeking mobile applications to manage their digital assets. However, many existing cryptocurrency wallet apps are either overly complex, making them difficult for beginners to use, or overly simplified, lacking comprehensive support for asset management. The goal of redesigning this cryptocurrency wallet app is to provide users with a more user-friendly, intuitive, and professional experience, enabling users of all levels to manage their assets with ease.', 'This redesign focuses on creating an intuitive cryptocurrency wallet interface, addressing user operational complexity through streamlined feature organization and a professional visual language. Additionally, clear asset overviews and real-time data updates are included to enable users to stay informed about their financial status at any time. The design employs a dark mode with high-contrast icons and typography to enhance visual appeal and readability, ensuring a comfortable experience in various environments.', '1. The current wallet interface is overly complex, requiring users to spend significant time learning how to operate it.\r\n\r\n2. The lack of an effective information architecture makes it difficult for users to quickly locate desired features, despite the app’s rich functionality.\r\n\r\n3. The visual design is dull, lacking professionalism and appeal, which undermines user trust in the application.\r\n\r\n4. There is no clear overview of user assets or real-time data display, leading to inefficiencies in asset management.', '1. Clear information architecture: \r\nOrganized the app’s features into distinct sections (e.g., “Events,” “Applications,” “Wallet”), allowing users to quickly locate what they need.\r\n\r\n2. Intuitive asset display: \r\nThe home screen offers real-time updates and clear categorization of user assets, enabling users to easily understand total and segmented financial data.\r\n\r\n3. Dark mode with contrast design: \r\nA dark mode paired with high-contrast typography and icons enhances the tech-savvy feel and supports prolonged use without causing eye strain.\r\n\r\n4. User guidance and call-to-action (CTA):\r\nClear feature entrances and icons, combined with prominent action buttons (e.g., “Transfer,” “Deposit,” “View Details”), guide users through key operations seamlessly.\r\n\r\n5.Enhanced visual hierarchy: \r\nHigh-quality imagery and dynamic icons add professionalism and appeal, delivering an overall improved user experience.', '', 'November ,2020'),
(3, 'Earbuds Design', 'project-03.jpg', 'Graphic design', 'This is EchoWave, a wireless earbud design emphasizing both a futuristic and stylish aesthetic while integrating practical features such as noise cancelation, smart touch controls, long battery life, and the latest Bluetooth V8.1 technology. The entire product was modeled from scratch using Cinema 4D, and I also created promotional visuals and videos to showcase the product’s functionality and highlight the brand’s commitment to technological innovation.', 'EchoWave is a wireless earbud that combines technological innovation with stylish design, offering features such as noise cancelation, smart touch controls, and long battery life. Starting with the structural and aesthetic aspects, I used Cinema 4D to create a detailed 3D model. Promotional visuals were designed with gradient backgrounds and modern icons to emphasize the earbuds’ technological and user-friendly qualities. A dynamic promotional video was also produced to vividly showcase the product’s features, helping consumers quickly grasp its value.', '1. Technical Challenges: \r\nDesigning the earbud structure required thorough research into internal components and functional arrangements to ensure practicality and feasibility.\r\n\r\n2. Learning Curve: \r\nAs a first-time user of Cinema 4D for 3D modeling and rendering, mastering material textures and lighting effects posed significant challenges.\r\n\r\n3. Market Positioning and Appeal: \r\nBalancing technical features with visual attractiveness was crucial to capturing user interest and conveying brand value.\r\n\r\n4. Multimedia Production: \r\nBeyond product modeling, creating high-quality promotional images and videos required comprehensive knowledge of design, animation, and market demands.', '1. In-depth Research and Planning: \r\nStudied earbud structures and functional designs to ensure the product’s aesthetics align with practical applications.\r\n\r\n2. Precise Modeling and Rendering: \r\nUsed Cinema 4D to create 3D models with realistic materials and lighting, making the design visually engaging and lifelike.\r\n\r\n3. Visual Design Strategy: \r\nApplied vibrant gradient backgrounds and high-contrast icons to highlight features and create a modern appeal.\r\n\r\n4. Multimedia Integration: \r\nDeveloped promotional visuals and videos incorporating dynamic showcases to enhance consumer understanding and interest in the product.\r\n\r\n5. User Experience Focus: \r\nIntegrated features like noise cancelation, touch controls, and long battery life to ensure the design is not only eye-catching but also meets everyday needs.', 'earbuds.mp4', 'October ,2024'),
(4, 'ZIMA Design', 'project-04.jpg', '', 'ZIMA is a low-alcohol beverage crafted for consumers who desire a refreshing and light drinking experience. I designed the entire visual identity for ZIMA, including 3D bottle modeling, promotional images, video ads, and a responsive website (RWD). The product comes in three flavors—Orange, Peach, and Blueberry—each emphasizing a fresh and fruity character. The design highlights a modern, vibrant, and sophisticated aesthetic.', 'In the design process for ZIMA, I utilized Cinema 4D to create the 3D bottle model and incorporated splashing juice elements to showcase the fruity essence of the product. The promotional images feature bold colors and dynamic designs to draw attention and enhance the brand’s identity. Additionally, I developed a responsive website to ensure that ZIMA’s product information is presented seamlessly across various devices, enhancing the brand’s digital experience.', '1. Technical Challenges: \r\nAccurately rendering the transparent glass bottle material and realistic splash effects in Cinema 4D.\r\n\r\n2. Brand Image Development: \r\nBalancing the light, casual nature of a low-alcohol beverage with a sophisticated brand identity.\r\n\r\n3. Multi-platform Compatibility: \r\nEnsuring promotional visuals and the website are optimized for various devices, providing a consistent user experience.\r\n\r\n4. Market Competition: \r\nDifferentiating ZIMA from other low-alcohol beverages to capture consumer attention.', '1. Learning and Practice: \r\nStudied multiple Cinema 4D tutorials to master rendering techniques for transparent materials and realistic splash effects.\r\n\r\n2. Brand Development: \r\nEmployed fresh, vibrant colors and dynamic elements to convey a lively image while maintaining a clean and elegant design.\r\n\r\n3. Responsive Design: \r\nImplemented modern RWD techniques to ensure seamless website functionality across all devices, enhancing the user experience.\r\n\r\n4. Creative Presentation: \r\nHighlighted ZIMA’s fruity essence and the variety of three flavors in promotional images and videos to draw attention and boost market competitiveness.', 'ZIMA.mp4', 'January ,2024'),
(5, 'CECI Cosmetic Design', 'project-05.jpg', '', 'CECI is a skincare brand centered on natural hydration, targeting consumers who value natural ingredients and effective moisturizing solutions. I revamped the brand’s identity, designing a new logo, product packaging, and labels, along with promotional videos and advertising visuals. The brand’s primary color palette—white and aquamarine—conveys a fresh and pure aesthetic, emphasizing natural and soothing qualities. The product line includes three key items: toner, cream, and serum.', 'The core of this design project was to establish CECI as a professional yet approachable brand. I created a new logo featuring clean geometric elements and aquamarine tones to reflect a blend of nature and sophistication. Each product received customized packaging and labels, unifying the brand’s visual language while ensuring clear product information. For the promotional video and advertising visuals, I employed soft tones and fluid compositions to reinforce the brand’s gentle and hydrating image.', '1. Logo Design Challenges: \r\nCreating a simple yet distinctive logo that conveys the brand’s natural and effective qualities.\r\n\r\n2. Packaging Consistency: \r\nEnsuring visual consistency across packaging designs for three products while highlighting their individual features.\r\n\r\n3. Brand Perception: \r\nEstablishing a professional yet approachable brand identity through visual design.\r\n\r\n4. Market Competition: \r\nDifferentiating CECI in a highly competitive skincare market.', '1.Logo Exploration: \r\nIteratively tested various design styles, ultimately choosing natural curves paired with aquamarine to highlight the brand’s identity.\r\n\r\n2. Refined Packaging: \r\nUsed white as the base color with aquamarine accents, incorporating minimal patterns to differentiate the toner, cream, and serum while showcasing their unique qualities.\r\n\r\n3. Multimedia Presentation: \r\nProduced professional promotional videos and ads emphasizing the products’ hydrating benefits and natural ingredients to attract attention and enhance brand appeal.\r\n\r\n4. Enhanced Competitiveness: \r\nDelivered a cohesive and high-quality brand visual design, establishing CECI as a distinctive and trustworthy presence in the skincare market.', 'Mackup.mp4', ' November ,2024'),
(6, 'Casino App', 'project-06.png', '', 'The Casino App is an online platform offering entertainment and gambling experiences, but its outdated design lacked the visual appeal needed to attract modern users. To align the app with contemporary aesthetic trends, I redesigned its interface using black as the primary background color and yellow as the accent color, creating a blend of sophistication and energy. Additionally, flat design principles were applied to enhance the app’s overall aesthetics and usability.', 'The goal of this redesign was to modernize the Casino App’s interface, making it more visually appealing and enhancing the user experience. I reorganized the layout to present information in a more intuitive way and added polished illustrations and icons to elevate the interface’s visual impact. By using black as the main color and yellow as an accent, the design maintains the brand’s premium feel while introducing vibrant highlights. The overall flat design approach brings simplicity and modernity, ensuring the app stands out in a competitive market.', '1. Outdated Design Style: \r\nThe original interface did not meet modern users’ high expectations for visual appeal.\r\n\r\n2. Disorganized Layout and Information Architecture: \r\nUsers found it challenging to quickly locate desired features, hindering the user experience.\r\n\r\n3. Lack of Visual Hierarchy: \r\nThe original design lacked accent colors and visual elements to draw user attention.\r\n\r\n4.Disconnected from Market Trends: \r\nThe interface appeared cluttered and out of sync with the growing trend of flat design.', '1. Primary and Accent Colors: \r\nBlack was used as the main color to evoke a professional and mysterious feel, complemented by yellow as an accent color to enhance visual appeal and hierarchy.\r\n\r\n2.Reorganized Layout: \r\nThe information architecture was restructured to present features clearly, improving user navigation and interaction.\r\n\r\n3.Incorporated Illustrations and Icons: \r\nHigh-quality illustrations and icons were added to enhance visual impact and highlight functional sections.\r\n\r\n4.Adopted Flat Design: \r\nSimplified design elements with clean edges and modern typography, making the interface more intuitive and aligned with current trends.', '', 'August, 2021'),
(7, 'Online Shopping Mall App', 'project-07.png', '', 'The Online Shopping Mall App is an all-in-one platform offering a wide range of products and shopping functionalities. However, the original design was somewhat plain and failed to meet modern users’ high expectations for aesthetics and interactivity. To align the app with current trends and user needs, I undertook a redesign using a purple gradient and white as the primary color scheme. I also experimented with a new design approach—neumorphism—to create a visually appealing and engaging interface.', 'The goal of the redesign was to enhance the visual appeal and user experience of the Online Shopping Mall App. I utilized a purple gradient as the main color scheme, paired with white for the background, to create a fresh and premium atmosphere. The layout was restructured to emphasize information hierarchy and organization, ensuring users can easily find desired features. Additionally, I incorporated refined illustrations and neumorphic design elements, simulating realistic textures and shadow effects to add depth to the interface and make the overall style more modern and engaging.', '1. Outdated Design Style: \r\nThe original interface lacked modernity and struggled to attract younger user groups.\r\n\r\n2. Unintuitive Layout: \r\nThe disorganized information architecture made it difficult for users to navigate and interact efficiently.\r\n\r\n3. Lack of Design Innovation: \r\nThe previous design was overly flat, offering limited visual engagement.\r\n\r\n4. Insufficient Visual Hierarchy: \r\nThe absence of distinct color pairings and layering made the interface appear monotonous.', '1. Purple Gradient with White: \r\nUtilized a combination of purple gradient and white to create a fresh and visually appealing interface.\r\n\r\n2. Layout Optimization: \r\nReorganized the information structure to make functional modules more intuitive and improve user efficiency.\r\n\r\n3. Incorporated Neumorphism: \r\nSimulated realistic textures and shadow effects to add depth and interactivity to the design.\r\n\r\n4. Added Illustrations and Details: \r\nEnhanced the interface’s visual presentation with high-quality illustrations and detailed design elements.', '', 'September, 2021');

-- --------------------------------------------------------

--
-- 資料表結構 `projects_skills`
--

CREATE TABLE `projects_skills` (
  `project_id` int UNSIGNED NOT NULL,
  `skill_id` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `project_category`
--

CREATE TABLE `project_category` (
  `id` int UNSIGNED NOT NULL,
  `project_id` varchar(20) NOT NULL,
  `category_id` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `project_category`
--

INSERT INTO `project_category` (`id`, `project_id`, `category_id`) VALUES
(4, '1', '1'),
(5, '2', '1'),
(6, '3', '1'),
(7, '3', '2'),
(8, '3', '3'),
(9, '3', '4'),
(10, '3', '5'),
(11, '4', '1'),
(12, '4', '2'),
(13, '4', '3'),
(14, '4', '4'),
(15, '4', '5'),
(16, '5', '2'),
(17, '5', '3'),
(18, '6', '1'),
(19, '7', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `project_images`
--

CREATE TABLE `project_images` (
  `id` int UNSIGNED NOT NULL,
  `project_id` int NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image`) VALUES
(1, 1, 'project-01-1.png'),
(2, 1, 'project-01-2.png'),
(3, 1, 'project-01-3.png'),
(4, 2, 'project-02-1.png'),
(5, 2, 'project-02-2.png'),
(13, 3, 'project-03-1.jpg'),
(14, 3, 'project-03-2.jpg'),
(15, 3, 'project-03-3.jpg'),
(16, 3, 'project-03-4.jpg'),
(17, 3, 'project-03-6.jpg'),
(18, 3, 'project-03-7.jpg'),
(19, 3, 'project-03-5.png'),
(20, 4, 'project-04-1.jpg'),
(21, 4, 'project-04-2.jpg'),
(22, 4, 'project-04-3.png'),
(23, 5, 'project-05-1.jpg'),
(24, 5, 'project-05-2.jpg'),
(25, 5, 'project-05-3.jpg'),
(26, 5, 'project-05-4.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `Skills`
--

CREATE TABLE `Skills` (
  `id` int UNSIGNED NOT NULL,
  `skill_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Skills`
--

INSERT INTO `Skills` (`id`, `skill_name`) VALUES
(1, 'Wireframing'),
(2, 'Prototyping'),
(3, 'User Research'),
(4, 'Design Thinking'),
(5, 'Branding'),
(6, 'Edit video');

-- --------------------------------------------------------

--
-- 資料表結構 `Tools`
--

CREATE TABLE `Tools` (
  `id` int UNSIGNED NOT NULL,
  `tool_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Tools`
--

INSERT INTO `Tools` (`id`, `tool_name`) VALUES
(1, 'Figma'),
(2, 'Sketch'),
(3, 'Adobe XD'),
(4, 'Illustrator'),
(5, 'Photoshop'),
(6, 'Cinema 4D'),
(7, 'After Effect'),
(8, 'Adobe Premiere'),
(9, 'HTML'),
(10, 'CSS'),
(11, 'Javascript');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'root', 'root'),
(2, 'joy', '1234');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Media`
--
ALTER TABLE `Media`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `projects_skills`
--
ALTER TABLE `projects_skills`
  ADD PRIMARY KEY (`project_id`);

--
-- 資料表索引 `project_category`
--
ALTER TABLE `project_category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Skills`
--
ALTER TABLE `Skills`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Tools`
--
ALTER TABLE `Tools`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `category`
--
ALTER TABLE `category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Contact`
--
ALTER TABLE `Contact`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Media`
--
ALTER TABLE `Media`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Project`
--
ALTER TABLE `Project`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `projects_skills`
--
ALTER TABLE `projects_skills`
  MODIFY `project_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `project_category`
--
ALTER TABLE `project_category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Skills`
--
ALTER TABLE `Skills`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Tools`
--
ALTER TABLE `Tools`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
