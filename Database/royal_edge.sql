-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 06:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royal_edge`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'samad', 'samad@gmail.com', 'samad');

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE `birthday` (
  `id` int(11) NOT NULL,
  `hotal_name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `hotal_name`, `description`, `city`, `price`, `image`) VALUES
(4, 'Ramada by Wyndham, Islamabad', 'Situated in Islamabad, 9.1 km from Shah Faisal Mosque, Ramada by Wyndham Islamabad features accommodation with a fitness centre, free private parking, a terrace and a restaurant. This 4-star hotel offers room service, a 24-hour front desk and free Wi', 'ISLAMABAD', 40000, 'upload/ramada-wyd-isl-exterior.jpeg'),
(5, 'Marriott Hotel, Karachi', 'Located opposite Frere Hall and Park, the 5-star Karachi Marriott Hotel offers modern and luxurious rooms with a flat-screen cable TV. It features 2 restaurants , spa and outdoor swimming pool. The air-conditioned and fully carpeted rooms each have i', 'KARACHI', 30000, 'upload/marriotexterior2.webp'),
(6, 'Cecil Hotel, Murree', 'Cecil Murree in Murree features 5-star accommodation with a garden, a terrace and a restaurant. With free WiFi, this 5-star hotel offers room service and a 24-hour front desk. Free private parking is available and the hotel also offers car hire for g', 'MURREE', 50000, 'upload/Cecil Murree-murree-cecilexterior.jpg'),
(7, 'Peshawar serena hotel, Peshawer', 'Khyber Road Peshawar Golf Club, Peshawar 25000 Pakistan A great choice for a stay in Peshawar, Peshawar Serena Hotel is only 3.8 mi (6.1 km) from the airport. Guests can be pampered with spa services at the spa and grab a bite to eat at one of the 3 ', 'PESHAWER', 60000, 'upload/exterior2-Peshawar-serena-hotel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booked_carrental`
--

CREATE TABLE `booked_carrental` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `cnic_no` int(50) NOT NULL,
  `pickup_date` date NOT NULL,
  `dropof_date` date NOT NULL,
  `hotel` varchar(50) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked_carrental`
--

INSERT INTO `booked_carrental` (`id`, `name`, `email`, `phone`, `cnic_no`, `pickup_date`, `dropof_date`, `hotel`, `car_name`, `payment_method`, `user_id`) VALUES
(14, 'Abdul Samad', 'abdulsamadalvi73@gmail.com', 2147483647, 2147483647, '2023-10-27', '2023-10-29', 'Indus Hotel', 'KIA SPORTAGE', 'Cash Payment', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booked_hotel`
--

CREATE TABLE `booked_hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(40) NOT NULL,
  `person` int(11) NOT NULL,
  `catagory` varchar(50) NOT NULL,
  `hotel` varchar(50) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `cnic_no` int(40) NOT NULL,
  `cnic_img` varchar(100) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked_hotel`
--

INSERT INTO `booked_hotel` (`id`, `name`, `email`, `phone`, `person`, `catagory`, `hotel`, `checkin_date`, `checkout_date`, `cnic_no`, `cnic_img`, `payment_method`, `user_id`) VALUES
(68, 'Samad', 'abdulsamadalvi73@gmail.com', 2147483647, 2, 'Premium Room', 'Serena Hotel, Islamabad', '2023-10-28', '2023-10-30', 2147483647, '../Admin/Dashboard/upload/feedbackimg.jpeg', 'Cash Payment', 6),
(69, 'Samad', 'abdulsamadalvi73@gmail.com', 2147483647, 2, 'Deluxe Room', 'Marriott Hotel, Islamabad', '2023-10-21', '2023-10-23', 345435446, '../Admin/Dashboard/upload/feedbackimg.jpeg', 'Cash Payment', 6),
(72, 'Abdul Samad', 'abdulsamadalvi73@gmail.com', 2147483647, 2, 'Premium Room', 'Ambiance Boutique Art Hotel, Karachi', '2023-10-27', '2023-10-28', 2147483647, '../Admin/Dashboard/upload/Ambiance Boutique Art Hotel-manager.jpg', 'Cash Payment', 6);

-- --------------------------------------------------------

--
-- Table structure for table `car_rental`
--

CREATE TABLE `car_rental` (
  `id` int(11) NOT NULL,
  `car_name` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `seats` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `big_suitcases` int(11) NOT NULL,
  `small_suitcases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_rental`
--

INSERT INTO `car_rental` (`id`, `car_name`, `description`, `seats`, `price`, `image`, `big_suitcases`, `small_suitcases`) VALUES
(11, 'HONDA CIVIC', 'Booking the Honda Civic comes with a multitude of advantages that make it a smart choice. With its sleek design, advanced technology, and superior fuel efficiency, the Civic offers a comfortable and stylish ride for all your journeys. Whether you\'re seeking a reliable daily driver or a sporty, responsive performance, the Honda Civic has you covered. Plus, its renowned safety features ensure peace of mind on the road. Don\'t miss the opportunity to experience these benefits – book the Honda Civic ', 4, 10000, 'upload/car-rental-car-pics1-removebg-preview.png', 2, 1),
(12, 'TOYOTA COROLLA', 'The Toyota Corolla, a true icon in the automotive world, is an exceptional choice for booking your next vehicle. Renowned for its reliability, fuel efficiency, and low maintenance costs, the Corolla offers a worry-free driving experience. With a spacious and comfortable interior, it\'s perfect for both daily commuting and long road trips. The Corolla\'s advanced technology features keep you connected and entertained, while its top-notch safety systems provide peace of mind. When you book the Toyot', 4, 15000, 'upload/car-rental-car-pics2-removebg-preview.png', 2, 2),
(13, 'KIA SPORTAGE', 'The Kia Sportage is the ideal choice for those seeking a dynamic and versatile SUV. With its eye-catching design and outstanding performance, it\'s a symbol of style and capability. The spacious interior provides comfort and flexibility for both passengers and cargo, making it perfect for family trips or outdoor adventures. The Sportage is packed with advanced technology and safety features to enhance your driving experience, and its fuel efficiency ensures economical operation. When you book the', 5, 20000, 'upload/car-rental-car-pics3-removebg-preview.png', 4, 2),
(14, 'TOYOTA FURTUNER', 'The Toyota Fortuner is the epitome of rugged elegance and power on the road. It\'s a robust and versatile SUV designed to conquer both urban streets and challenging terrains with ease. With its spacious and well-appointed interior, it offers a premium driving experience and can accommodate your family and luggage comfortably for long journeys. The Fortuner is equipped with advanced technology and safety features, ensuring you\'re well-connected and protected on your travels. Booking the Toyota For', 7, 30000, 'upload/Toyota-Fortuner-110120211829-removebg-preview.png', 4, 4),
(15, 'HONDA BR-V', 'The Honda BR-V is a versatile and practical choice for those in search of a compact SUV. With its modern design and impressive fuel efficiency, the BR-V offers a smooth and enjoyable driving experience for both urban and highway adventures. Its flexible and spacious interior can comfortably seat your family or friends, and the third-row seating adds to its versatility. Packed with innovative technology and Honda\'s renowned safety features, the BR-V keeps you connected and secure during your jour', 7, 22000, 'upload/New-Honda-BR-V-facelift-10-1068x559-2-removebg-preview.png', 4, 4),
(16, 'HYUNDAI SUNATA', 'The Hyundai Sonata is a striking midsize sedan that combines modern style and advanced technology. Its spacious and comfortable interior ensures an enjoyable ride for both driver and passengers. With top-tier safety features and a reputation for reliability, the Sonata is the perfect choice for daily commutes and road trips. Booking the Hyundai Sonata means experiencing the best of both form and function in a single, elegant package, making every journey memorable.', 4, 18000, 'upload/sunata-removebg-preview.png', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`) VALUES
(1, 'ISLAMABAD'),
(2, 'MURREE'),
(3, 'LAHORE'),
(4, 'KARACHI'),
(5, 'MULTAN'),
(6, 'PESHAWER'),
(7, 'SWAT'),
(8, 'NATHIA GALI');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`) VALUES
(2, 'Abdul Samad Alvi', 'abdulsamad@gmail.com', 'Rondam massage form samad'),
(3, 'Babar', 'babar@gmail.com', 'Random msg form babar\r\n'),
(4, 'Abdul Samad Alvi', 'abdulsamadalvi73@gmail.com', 'wefewfefsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `event_reserve`
--

CREATE TABLE `event_reserve` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `cnic_no` int(11) NOT NULL,
  `cnic_img` int(250) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `event` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_reserve`
--

INSERT INTO `event_reserve` (`id`, `name`, `email`, `phone`, `person`, `hotel_name`, `date`, `cnic_no`, `cnic_img`, `payment_method`, `event`) VALUES
(1, 'Abdul Samad', 'samad@gmail.com', 2147483647, 40, 'Serena Hotel', '2023-10-21', 2147483647, 0, 0, ''),
(2, 'Abdul Samad', 'abdulsamadalvi73@gmail.com', 2147483647, 30, 'PC Karchi', '2023-10-21', 2147483647, 0, 0, ''),
(3, 'Abdul Samad', 'abdulsamadalvi73@gmail.com', 2147483647, 30, 'Serena Hotel', '2023-10-27', 2147483647, 0, 0, 'Wedding Event'),
(4, 'Abdul Samad', 'abdulsamadalvi73@gmail.com', 2147483647, 15, 'Avari Xpress, Multan', '2023-10-25', 344354543, 0, 0, 'Wedding Event'),
(5, 'Abdul Samad', 'samadalvihafizabdul@gmail.com', 2147483647, 50, 'Avari Xpress, Multan', '2023-10-26', 2147483647, 0, 0, 'Birthday Event'),
(6, 'Abdul Samad', 'abdulsamadalvi73@gmail.com', 2147483647, 40, 'PC HOTEL', '2023-10-25', 2147483647, 0, 0, 'Birthday Event'),
(7, 'Abdul Samad', 'abdulsamadalvi73@gmail.com', 2147483647, 50, 'Peshawar serena hotel, Peshawer', '2023-10-28', 2147483647, 0, 0, 'Birthday Event'),
(8, 'Abdul Samad', 'abdulsamadalvi73@gmail.com', 2147483647, 50, 'Marriott Hotel, Karachi', '2023-10-27', 2147483647, 0, 0, 'Wedding Event'),
(9, 'Abdul Samad', 'samadalvihafizabdul@gmail.com', 2147483647, 60, 'Luxus Grand Hotel, Lahore', '2023-10-21', 5645464, 0, 0, 'Wedding Event');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `cityId` int(11) NOT NULL,
  `hotelid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `description`, `price`, `image`, `cityId`, `hotelid`) VALUES
(15, 'Serena Hotel, Islamabad', 'Islamabad Serena Hotel welcomes guests with an outdoor swimming pool and relaxing spa treatments. Located in the capital city of Islamabad, the hotel is situated 12 km away from Chaklala Airport and provides free airport shuttle services.  Rooms are stylish and tastefully furnished. All of the rooms come with a satellite TV, air conditioning and a minibar. Modern en suite bathrooms will provide plush bathrobes and free toiletries.  Islamabad Serena Hotel houses a fitness centre and sauna facilit', 25000, 'upload/exterior-serena.jpg', 1, NULL),
(16, 'Luxus Grand Hotel, Lahore', 'Discover refined luxury in the heart of Islamabad at Serena Hotel. Luxus Grand Hotel is a 100 room property, equipped with 55 Deluxe Rooms, 20 executive rooms, 5 Super Executive Rooms, 16 family rooms and 2 Royal Suites. 3 Banquet halls / Conference halls, 4 board rooms and 1 restaurant. Our team is eager to deliver you a warm and diligent service and cater to any need you may have during your stay.', 20000, 'upload/luxusexterior.jpg', 3, NULL),
(20, 'Roomy Signature Hotel, Islamabad', 'Located in Islamabad, within 5.5 km of Shah Faisal Mosque and 9.4 km of Lake View Park, Roomy Signature Hotel, Islamabad provides accommodation with a restaurant and free WiFi throughout the property as well as free private parking for guests who drive. This 3-star hotel offers room service and a 24-hour front desk. The accommodation features airport transfers, while a car rental service is also available.  The hotel will provide guests with air-conditioned rooms offering a desk, a kettle, a fri', 20000, 'upload/roomyexterior.jpg', 1, NULL),
(21, 'Ramada by Wyndham, Islamabad ', 'Situated in Islamabad, 9.1 km from Shah Faisal Mosque, Ramada by Wyndham Islamabad features accommodation with a fitness centre, free private parking, a terrace and a restaurant. This 4-star hotel offers room service, a 24-hour front desk and free WiFi. The accommodation provides an ATM, a concierge service and currency exchange for guests.  The hotel will provide guests with air-conditioned rooms offering a desk, a safety deposit box, a flat-screen TV and a private bathroom with a shower. At Ra', 18000, 'upload/exterior.jpeg', 1, NULL),
(22, 'Marriott Hotel, Islamabad', 'The 5-star Islamabad Marriott Hotel provides high speed wireless internet, an indoor pool and a fitness centre. Pampering spa treatments with separate male and female lounges are also available. Room service is provided 24 hours.  The modern air-conditioned rooms are all equipped with a 42-inch flat-screen TV, a personal safe and tea/coffee making facilities. En suite bathrooms come with hot-water showers, bathrobes and free toiletries.  Islamabad Marriott Hotel is about 20 km from both Islamaba', 30000, 'upload/exterior2.jpg', 1, NULL),
(23, 'Best Western Premier, Islamabad', 'Situated in Islamabad, 8.8 km from Shah Faisal Mosque, Best Western Premier Islamabad features accommodation with a fitness centre, free private parking, a garden and a terrace. With a restaurant, the 4-star hotel has air-conditioned rooms with free WiFi, each with a private bathroom. The hotel has a sauna and free shuttle service.  At the hotel, every room includes a desk and a flat-screen TV. The rooms come with a safety deposit box, while selected rooms also feature a balcony and others also ', 20000, 'upload/westernexterior.jpg', 1, NULL),
(24, 'Pearl Continental Hotel, Lahore', 'Located within Shahrah-e-Quaid-e-Azam (The Mall), Pearl Continental Hotel Lahore offers 5-star accommodation with free Wi-Fi and floor-to-ceiling windows. An outdoor pool and a fitness centre are available. A free transfer is provided to and from Lahore International Airport.  The well-decorated rooms come with air conditioning, a flat-screen TV and a minibar. Some rooms include a personal safe. Bathrooms are equipped with a shower and hairdryer.  Pearl Continental Hotel, Lahore is 6 km from Lah', 25000, 'upload/pearlexterior.jpg', 3, NULL),
(25, 'Ramada by Wyndham Lahore Gulberg II, Lahore', 'Ramada by Wyndham Lahore Gulberg II has a restaurant and a fitness centre in Lahore. This property is located a short distance from attractions such as Vogue Towers and Pace Shopping Mall. Attractions in the area include Wagah Border, 23 km away, or Gaddafi Stadium, situated 2.3 km from the property.  At the hotel, the rooms have a wardrobe.A continental breakfast is served every morning at the property.', 15000, 'upload/gulbergexterior.jpg', 3, NULL),
(26, 'Ambiance Boutique Art Hotel, Karachi', 'Situated in Karachi, 2.7 km from Seaview Beach, Ambiance Boutique Art Hotel Karachi features accommodation with a garden, free private parking, a shared lounge and a terrace. This 5-star hotel offers a concierge service. The accommodation provides a 24-hour front desk, airport transfers, room service and free WiFi throughout the property.  The hotel will provide guests with air-conditioned rooms offering a wardrobe, a kettle, a fridge, a minibar, a safety deposit box, a flat-screen TV and a priv', 25000, 'upload/ambianceexterior.jpg', 4, NULL),
(27, 'Avari Tower, Karachi', 'Avari Tower features an outdoor pool, spa and fitness centre. Offering modern air conditioned rooms, the property provides free WiFi in all areas. It is 15 km from Jinnah Airport.  Rooms come with a flat-screen cable/satellite TV, safety deposit box and minibar.', 22000, 'upload/avariexterior.jpg', 4, NULL),
(28, 'Marriott Hotel, Karachi', 'Located opposite Frere Hall and Park, the 5-star Karachi Marriott Hotel offers modern and luxurious rooms with a flat-screen cable TV. It features 2 restaurants , spa and outdoor swimming pool.  The air-conditioned and fully carpeted rooms each have its own private bathroom, which include free toiletries, shower, hairdryer and slippers. An electric kettle and minibar can be found in each room.', 15000, 'upload/marriotexterior2.webp', 4, NULL),
(29, 'Movenpick Hotel, Karachi', 'Boasting 4 dining options, Mövenpick Hotel Karachi features an outdoor pool, fitness centre, free parking and luxurious rooms with city views. Conference and banquet facilities can be arranged, while the friendly staff is available round-the-clock.  Situated along Club Road, the hotel is about 3 km to the National Museum and 5.2 km to Clifton Fish Aquarium. Askari Park is 10 km away, while Jinnah International Airport is accessible with a 17 km drive.', 18000, 'upload/movenpickexterior.jpg', 4, NULL),
(30, 'Peral Continental Hotel, Karachi', 'Located in the commercial centre of south central Karachi, The 5-star Pearl Continental Hotel offers luxurious and modern rooms with free Wi-Fi. 6 dining options and an indoor pool await guests.  Air-conditioned and fully carpeted, each room features a flat-screen satellite TV, minibar and iron. Private bathroom includes a hair dryer and shower. A seating area, safe and coffee machine is standard in all rooms.', 15000, 'upload/pearl_exterior.jpg', 4, NULL),
(31, 'Cecil Hotel, Murree', 'Cecil Murree in Murree features 5-star accommodation with a garden, a terrace and a restaurant. With free WiFi, this 5-star hotel offers room service and a 24-hour front desk. Free private parking is available and the hotel also offers car hire for guests who want to explore the surrounding area.  The units come with air conditioning, a flat-screen TV with satellite channels, a fridge, a kettle, a shower, free toiletries and a wardrobe. All rooms come with a private bathroom with a hairdryer, wh', 30000, 'upload/cecilexterior.jpg', 2, NULL),
(32, 'Hotel One Mall Road, Murree', 'Hotel One Mall Road Murree is a 3-star property located in Murree. Among the facilities of this property are a restaurant, room service and a 24-hour front desk, along with free WiFi throughout the property. The hotel features family rooms.  Guest rooms are equipped with a flat-screen TV with satellite channels, fridge, a kettle, a shower, free toiletries and a desk. The hotel provides certain rooms that include a terrace, and each room is equipped with a private bathroom with a bath and a haird', 20000, 'upload/onemallroadexterior.jpg', 2, NULL),
(33, 'Ortus - Murree Hills, Murree ', 'Murree  Ortus - Murree Hills features mountain views, free WiFi and free private parking, set in Murree.', 22000, 'upload/ortusexterior.webp', 2, NULL),
(34, 'Pearl Continental Hotel Bhurban, Murree', 'Tastefully decorated, the elegant rooms come with earth colour tones and are bathed in warm light. They are equipped with a sofa seating area, flat-screen TV and private bathroom.  Guests can play a game of tennis, swim, or exercise at the gym. Relaxing in the hot tub or going horse riding are other good recreational activities.', 35000, 'upload/bhurhanexterior.jpg', 2, NULL),
(35, 'Ramada by Wyndham, Murree ', 'Ramada by Wyndham Murree Lower Topa Resort in Murree features 4-star accommodation with a terrace. With a garden, the 4-star hotel has air-conditioned rooms with free WiFi, each with a private bathroom. The accommodation provides room service, a 24-hour front desk and currency exchange for guests.  Guest rooms in the hotel are equipped with a flat-screen TV with satellite channels. At Ramada by Wyndham Murree Lower Topa Resort each room is fitted with bed linen and towels.', 30000, 'upload/ramadamurreeexterior.jpg', 2, NULL),
(36, 'Avari Xpress, Multan', 'Avari Xpress Multan offers 4-star accommodations with a restaurant. The property has a 24-hour front desk, airport transportation, room service and free WiFi throughout the property.  All guest rooms come with air conditioning, a flat-screen TV with cable channels, a fridge, a electric tea pot, a shower, free toiletries and a closet. At the hotel all rooms include bed linen and towels.  The nearest airport is Multan International Airport, 1.2 miles from Avari Xpress Multan.', 20000, 'upload/exterior-Avari- Xpress -Multan.webp', 5, NULL),
(37, 'Hotel One Lalazar, Multan', 'Hotel One Lalazar is a 3-star property located in Multan. Among the facilities of this property are a restaurant, room service and a 24-hour front desk, along with free WiFi throughout the property. The hotel features family rooms.  Guest rooms are equipped with a flat-screen TV with satellite channels, fridge, a kettle, a shower, free toiletries and a desk. The hotel provides certain rooms that include a terrace, and each room is equipped with a private bathroom with a bath and a haird.', 18000, 'upload/exterior-HotelOne-Lalazar-multan.avif', 5, NULL),
(38, 'Ramada by Wyndham, Multan', 'Ramada by Wyndham Multan has a restaurant and a fitness centre in Multan. At the hotel, the rooms have a wardrobe.A continental breakfast is served every morning at the property.The accommodation provides an ATM, a concierge service and currency exchange for guests.  The hotel will provide guests with air-conditioned rooms offering a desk, a safety deposit box, a flat-screen TV and a private bathroom with a shower. ', 25000, 'upload/exterior-ramada-multan.jpg', 5, NULL),
(39, 'Royal Mansion Hotel, Multan', ' Royal Mansion Hotel, Multan, is a luxurious 3-star hotel located on Tariq Road, right in the heart of the city. It offers spacious and well-appointed rooms with modern amenities, a multi-cuisine restaurant, a coffee shop, a banquet hall, and a business center. The hotel is known for its excellent service and hospitality, and is a popular choice for both business and leisure travelers.', 22000, 'upload/exterior-Royal-Mansion-Multan.avif', 5, NULL),
(40, 'Fort Continental Hotel, Peshawer', 'A great choice for a stay in Peshawar, Fort Continental Hotel is only 4.7 mi (7.5 km) from the airport. Guests looking for a bite to eat can visit Balahisaar Restaurant, which serves local cuisine. Guests can rest easy knowing that theres a carbon monoxide detector, a fire extinguisher, a smoke detector, a security system, a first aid kit and window guards on site. This property accepts credit cards and cash.', 18000, 'upload/exterior-Fort-Continental-Hotel.avif', 6, NULL),
(41, 'Peshawar serena hotel, Peshawer', 'Khyber Road Peshawar Golf Club, Peshawar 25000 Pakistan A great choice for a stay in Peshawar, Peshawar Serena Hotel is only 3.8 mi (6.1 km) from the airport. Guests can be pampered with spa services at the spa and grab a bite to eat at one of the 3 restaurants.Guests can indulge in a pampering treatment at the hotels full-service spa, MAISHA SPA. The spa is equipped with a sauna and a steam room. The spa is open daily.', 25000, 'upload/exterior2-Peshawar-serena-hotel.jpg', 6, NULL),
(42, 'One Hotel, Sawat', 'Hotel One Swat is a 3-star property situated in Swat. Featuring a terrace, the 3-star hotel has air-conditioned rooms with free WiFi, each with a private bathroom. There is a restaurant serving local cuisine, and free private parking is available.  All units in the hotel are fitted with a kettle. Rooms include a wardrobe and a flat-screen TV, and some rooms at Hotel One Swat have a balcony. The rooms will provide guests with a minibar.  A continental, Asian or halal breakfast can be enjoyed at t', 25000, 'upload/exterior.jpg', 7, NULL),
(43, 'Pearl Continental Hotel, Swat', 'Set in Swat, Pearl Continental Hotel Malam Jabba offers 5-star accommodation with a fitness centre, a garden and a restaurant. This 5-star hotel offers room service and a 24-hour front desk. The accommodation offers a concierge service, and luggage storage for guests.  The hotel will provide guests with air-conditioned rooms with a desk, a kettle, a safety deposit box, a flat-screen TV and a private bathroom with a bidet. At Pearl Continental Hotel Malam Jabba every room has bed linen and towels', 30000, 'upload/PC-swat-exterior.jpg', 7, NULL),
(44, 'Fogland Hotel, Nathia Gali', 'Indulge in comfort and luxury at Nathiagal is Fogland Hotel, a mere 2.5 km from Ayubia National Park. With a pleasant ambiance and rustic interiors, Fogland makes for a great stay in Nathia Gali. The rooms are spacious, with modern furniture, a large seating area, and big windows that offer uninterrupted views of the surroundings. Guests can also enjoy the convenience of a balcony, exceptional room service, and diligent housekeeping. Book your stay at the Fogland Hotel in Nathia Gali for an unfo', 30000, 'upload/exterior-FoglandHotel-NathiaGali.jpeg', 8, NULL),
(45, 'Hill Top Villa, Nathia Gali', 'Hill Top Villa features mountain views, free Wifi and free private parking, located in Nathia Gali.  All self-catered units feature parquet floors and are fitted with a satellite flat-screen TV, a safety deposit box, an equipped kitchen with an oven, and a private bathroom with bidet. Some units feature a terrace and/or a balcony with garden or inner courtyard views.  A continental, American or Asian breakfast is served at the property.  The villa has an outdoor fireplace.', 35000, 'upload/exterior-Hill-Top-Villa.jpg', 8, NULL),
(46, 'Hotel Elites, Nathia Gali', 'Hotel Elites is a luxury corporate resort located in one of the most panoramic areas of Pakistan, Nathiagali. The hotel offers a variety of accommodations, including Deluxe and Executive rooms, as well as cosy cottages and apartments for bigger families. All rooms are well-appointed with state-of-the-art furnishings and stunning views of the surrounding mountains.  In addition to its comfortable accommodations, Hotel Elites also offers a variety of amenities and activities to keep guests enterta', 25000, 'upload/exterior-hotel-elites.jpg', 8, NULL),
(47, 'Lemon Lodges By Roomy, Nathia Gali', 'Lemon Lodges By Roomy, Nathiagali is located in Nathia Gali. Featuring room service, this property also provides guests with a terrace. Theres a restaurant serving Local cuisine, and free private parking is available.  Featuring a private bathroom with a shower and free toiletries, rooms at the hotel also have a mountain view. All guest rooms in Lemon Lodges By Roomy, Nathiagali are equipped with a flat-screen TV and slippers.  Guests at the accommodation can enjoy a continental breakfast.', 35000, 'upload/exterior-Lemon-Lodges-By-Roomy.jpg', 8, NULL),
(48, 'Nathiagali Royal, Nathia Gali', 'Featuring a hot tub, Nathiagali Royal is located in Nathia Gali. This villa provides free private parking, a 24-hour front desk and free Wifi.  The villa features 7 bedrooms, 7 bathrooms, bed linen, towels, a flat-screen TV, a dining area, a fully equipped kitchen, and a terrace with mountain views.  Breakfast is available every morning, and includes continental, Italian and American options.  The villa has an outdoor fireplace. A car rental service is available at Nathiagali Royal.  The nearest', 40000, 'upload/exterior2-Nathiagali-Royal.jpg', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_details`
--

CREATE TABLE `hotel_details` (
  `id` int(11) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `manager_name` varchar(20) NOT NULL,
  `manager_img` varchar(250) NOT NULL,
  `img1` varchar(250) NOT NULL,
  `img2` varchar(250) NOT NULL,
  `img3` varchar(250) NOT NULL,
  `img4` varchar(250) NOT NULL,
  `img5` varchar(250) NOT NULL,
  `img6` varchar(250) NOT NULL,
  `hotelid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_details`
--

INSERT INTO `hotel_details` (`id`, `logo`, `manager_name`, `manager_img`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `hotelid`) VALUES
(10, 'upload/serena-hotels-logo-7FD323846D-seeklogo.com.png', 'Otto Kurzendorfer', 'upload/serena-islamabad-manager.jpg', 'upload/serena-isl-exterior.jpg', 'upload/serena-isl-interior.jpg', 'upload/serena-isl-dining.jpg', 'upload/serena-isl-pool.jpg', 'upload/serena-isl-room.jpg', 'upload/serena-isl-washroom.jpg', 15),
(12, 'upload/ramada-by-wyndham-logo-removebg-preview.png', 'Geoff Ballotti', 'upload/ramada-by-wyndham-manager-pic.jpg', 'upload/ramada-wyd-isl-exterior.jpeg', 'upload/ramada-wyd-isl-dining.avif', 'upload/ramada-wyd-isl-dining3.avif', 'upload/ramada-wyd-isl-dining5.avif', 'upload/ramada-wyd-isl-room1.avif', 'upload/ramada-wyd-isl-washroom.avif', 21),
(13, 'upload/signature-isl-logo-removebg-preview.png', 'NJ Syed Nadeem Jafar', 'upload/signature-isl-manager-pic.jpeg', 'upload/signature-roomy-exterior.jpg', 'upload/signature-roomy-events3.jpg', 'upload/signature-roomy-dining2.jpg', 'upload/signature-roomy-meeting-room.jpg', 'upload/signature-roomy-room7.jpg', 'upload/signature-roomy-washroom.jpg', 20),
(14, 'upload/Marriott_Hotel-logo-removebg-preview.png', 'David Richard O Hanl', 'upload/Marriott Hotel-manager-pic.jpeg', 'upload/Marriott Hotel-isl-exterior2.jpg', 'upload/Marriott Hotel-isl-dining7.jpg', 'upload/Marriott Hotel-isl-dining.jpeg', 'upload/Marriott Hotel-isl-dining2.jpeg', 'upload/Marriott Hotel-isl-room3.jpg', 'upload/Marriott Hotel-isl-room6.jpg', 22),
(15, 'upload/best-western-premier-hotel-logo-removebg-preview.png', 'Rashid Banday', 'upload/Best Western Premier-manager-pic.jpeg', 'upload/Best-Western Premier-exterior.jpg', 'upload/Best-Western Premier-sitting.jpg', 'upload/Best-Western Premier-dining4.jpg', 'upload/Best-Western Premier-meeting-room.jpg', 'upload/Best-Western Premier-room6.jpg', 'upload/Best-Western Premier-washroom2.jpg', 23),
(16, 'upload/Cecil_Murree_murree-logo-removebg-preview.png', 'Ali Gardezi', 'upload/Cecil -Murree-murree-manager-pic.jpeg', 'upload/Cecil Murree-murree-cecilexterior.jpg', 'upload/Cecil Murree-murree-room2.jpg', 'upload/Cecil Murree-murree-room14.jpg', 'upload/Cecil Murree-murree-sitting2.jpg', 'upload/Cecil Murree-murree-room10.jpg', 'upload/Cecil Murree-murree-washroom2.jpg', 31),
(17, 'upload/Hotel_One_Mall_Road-logo-removebg-preview.png', 'Musharraf Riaz', 'upload/Hotel One Mall Road-manager-pic.jpeg', 'upload/Hotel-One-Mall Road-Murree-exterior.jpg', 'upload/Hotel-One-Mall Road-Murree-sitting5.jpg', 'upload/Hotel-One-Mall Road-Murree-sitting.jpg', 'upload/Hotel-One-Mall Road-Murree-room6.jpg', 'upload/Hotel-One-Mall Road-Murree-sitting4.jpg', 'upload/Hotel-One-Mall Road-Murree-washroom.jpg', 32),
(18, 'upload/Ortus_Murree_Hills-logo-removebg-preview.png', 'Ali Hashmi', 'upload/Ortus Murree Hills-manager.jpeg', 'upload/Ortus-Murree-Hills-exterior.webp', 'upload/Ortus-Murree-Hills-sitting4.webp', 'upload/Ortus-Murree-Hills-sitting7.jpg', 'upload/Ortus-Murree-Hills-room7.jpg', 'upload/Ortus-Murree-Hills-room4.webp', 'upload/Ortus-Murree-Hills-sitting5.webp', 33),
(19, 'upload/Pearl_Continental_Hotel-logo-removebg-preview.png', 'Nadeem Riaz Chaudhry', 'upload/Pearl Continental Hotel-manager-pic.jpeg', 'upload/Pearl-Continental-Hotel-murree-exterior.jpg', 'upload/Pearl-Continental-Hotel-murree-dining4.jpg', 'upload/Pearl-Continental-Hotel-murree-playground.jpg', 'upload/Pearl-Continental-Hotel-murree-gym.jpg', 'upload/Pearl-Continental-Hotel-murree-room3.jpg', 'upload/Pearl-Continental-Hotel-murree-washroom.jpg', 34),
(20, 'upload/ramada-by-wyndham-logo-removebg-preview.png', 'Raja Shahbaz', 'upload/ramada-by-wyndham-manager-pic.jpg', 'upload/Ramada-by-Wyndham-Murree -exterior.jpg', 'upload/Ramada-by-Wyndham-Murree -dining2.webp', 'upload/Ramada-by-Wyndham-Murree -interiorview.jpg', 'upload/Ramada-by-Wyndham-Murree -room5.jpg', 'upload/Ramada-by-Wyndham-Murree -room6.jpg', 'upload/Ramada-by-Wyndham-Murree -washroom.jpg', 35),
(21, 'upload/Luxus_Grand_Hotel-logo-removebg-preview.png', 'Shaan Lashari', 'upload/Luxus Grand Hotel-manager.jpeg', 'upload/Luxus-Grand Hotel-exterior.jpg', 'upload/Luxus-Grand Hotel-interior1.jpg', 'upload/Luxus-Grand Hotel-pool2.jpg', 'upload/Luxus-Grand Hotel-interior2.jpg', 'upload/Luxus-Grand Hotel-room5.jpg', 'upload/Luxus-Grand Hotel-washroom2.jpg', 16),
(22, 'upload/Pearl_Continental_Hotel-logo-removebg-preview.png', 'Nadeem Riaz Chaudhry', 'upload/Pearl Continental Hotel-manager-pic.jpeg', 'upload/Pearl-Continental-Hotel-exterior.jpg', 'upload/Pearl-Continental-Hotel-dining.jpg', 'upload/Pearl-Continental-Hotel-events.jpg', 'upload/Pearl-Continental-Hotel-interior3.jpg', 'upload/Pearl-Continental-Hotel-room5.jpg', 'upload/Pearl-Continental-Hotel-washroom.jpg', 24),
(23, 'upload/ramada-by-wyndham-logo-removebg-preview.png', 'Raja Shahbaz', 'upload/ramada-by-wyndham-manager-pic.jpg', 'upload/Ramada-Lahore-exterior.jpg', 'upload/Ramada-Lahore-dining.jpg', 'upload/Ramada-Lahore-dining4.jpg', 'upload/Ramada-Lahore-meetingroom.jpg', 'upload/Ramada-Lahore-pool.jpg', 'upload/Ramada-Lahore-room6.jpg', 25),
(24, 'upload/Ambiance_Boutique_Art_Hotel-logo-removebg-preview.png', 'Qasim Qazi', 'upload/Ambiance Boutique Art Hotel-manager.jpg', 'upload/Ambiance Boutique Art Hotel-exterior.jpg', 'upload/Ambiance Boutique Art Hoteldining.jpg', 'upload/Ambiance Boutique Art Hotel-interior.jpg', 'upload/Ambiance Boutique Art Hotel-dining2.jpg', 'upload/Ambiance Boutique Art Hotel-room8.jpg', 'upload/Ambiance Boutique Art Hotelsitting2.jpg', 26),
(25, 'upload/Avari_Towers_Karachi-logo-removebg-preview.png', 'Qasim Jafri', 'upload/Avari Towers Karachi-manager.jpeg', 'upload/Avari Towers-karachi-exterior.jpg', 'upload/Avari Towers-karachi-dining3.jpg', 'upload/Avari Towers-karachi-dining7.jpg', 'upload/Avari Towers-karachi-gym.jpg', 'upload/Avari Towers-karachi-swiming-pool2.jpg', 'upload/Avari Towers-karachi-room3.jpg', 27),
(26, 'upload/Marriott_Hotel-logo-removebg-preview.png', 'David Richard O Hanl', 'upload/Marriott Hotel-manager-pic.jpeg', 'upload/Karachi Marriott Hotel-exterior.webp', 'upload/Karachi Marriott Hotel-interior.webp', 'upload/Karachi Marriott Hotel-dining2.webp', 'upload/Karachi Marriott Hotel-services1.webp', 'upload/Karachi Marriott Hotel-room1.webp', 'upload/Karachi Marriott Hotel-sitting4.webp', 28),
(27, 'upload/Movenpick_Hotel_Karachi-logo-removebg-preview.png', 'Muhammad Khurram Awa', 'upload/Mövenpick Hotel Karachi-manager.jpeg', 'upload/Mövenpick Hotel Karachi-exterior.jpg', 'upload/Mövenpick Hotel Karachi-sitting.jpg', 'upload/Mövenpick Hotel Karachi-dining1.jpg', 'upload/Mövenpick Hotel Karachi-dining5.jpg', 'upload/Mövenpick Hotel Karachi-room2.jpg', 'upload/Mövenpick Hotel Karachi-washroom1.jpg', 29),
(28, 'upload/Pearl_Continental_Hotel-logo-removebg-preview.png', 'Nadeem Riaz Chaudhry', 'upload/Pearl Continental Hotel-manager-pic.jpeg', 'upload/Pearl Continental-karachi-exterior.jpg', 'upload/Pearl Continental-karachi-event4.jpg', 'upload/Pearl Continental-karachi-interior2.jpg', 'upload/Pearl Continental-karachi-meeting-room3.jpg', 'upload/Pearl Continental-karachi-interior.jpg', 'upload/Pearl Continental-karachi-dining3.jpg', 30),
(29, 'upload/avari_xpress_multan-logo-removebg-preview.png', 'Syed Rizwan Bukhari', 'upload/avari xpress multan-manager.jpeg', 'upload/exterior-Avari- Xpress -Multan.webp', 'upload/dining1-Avari- Xpress -Multan.webp', 'upload/meeting-room-Avari- Xpress -Multan.webp', 'upload/room1-Avari- Xpress -Multan.webp', 'upload/gym-Avari- Xpress -Multan.jpg', 'upload/washroom-Avari- Xpress -Multan.avif', 36),
(30, 'upload/Hotel_One_Mall_Road-logo-removebg-preview.png', 'Kashif Christopher', 'upload/Hotel One Mall Road-manager-pic.jpeg', 'upload/exterior-HotelOne-Lalazar-multan.avif', 'upload/dining2-HotelOne-Lalazar-multan.avif', 'upload/interior-HotelOne-Lalazar-multan.jpg', 'upload/room5-HotelOne-Lalazar-multan.avif', 'upload/room7-HotelOne-Lalazar-multan.jpg', 'upload/sitting-HotelOne-Lalazar-multan.jpg', 37),
(31, 'upload/ramada-by-wyndham-logo-removebg-preview.png', 'Usman Ansari', 'upload/ramada-by-wyndham-multan-manager-pic.jpg', 'upload/exterior-ramada-multan.jpg', 'upload/interior-ramada-multan.jpg', 'upload/dining-ramada-multan.jpg', 'upload/suite1-ramada-multan.jpg', 'upload/room4-ramada-multan.jpg', 'upload/washroom2-ramada-multan.jpg', 38),
(32, 'upload/royal-mansion-multan-logo-removebg-preview.png', 'Fahad Haider', 'upload/royal-mansion-multan-manager.jpeg', 'upload/exterior-Royal-Mansion-Multan.avif', 'upload/dining-Royal-Mansion-Multan.avif', 'upload/interior-Royal-Mansion-Multan.avif', 'upload/room3-Royal-Mansion-Multan.avif', 'upload/room9-Royal-Mansion-Multan.jpg', 'upload/washroom-Royal-Mansion-Multan.avif', 39),
(35, 'upload/fort_continental_hotel-_peshawar-logo-pic-removebg-preview.png', 'Muhammad Fiaq', 'upload/fort continental hotel peshawar-manager-picture.jpeg', 'upload/exterior-Fort-Continental-Hotel.avif', 'upload/intertor-Fort-Continental-Hotel.avif', 'upload/dining-Fort-Continental-Hotel.jpg', 'upload/sitting2-Fort-Continental-Hotel.avif', 'upload/room2-Fort-Continental-Hotel.avif', 'upload/washroom-Fort-Continental-Hotel.avif', 40),
(36, 'upload/peshawar_serena_hotel_logo-pic-removebg-preview (1).png', 'Quratulain Nasir', 'upload/peshawar serena hotel-manager-pic.jpeg', 'upload/exterior2-Peshawar-serena-hotel.jpg', 'upload/dining2-Peshawar-serena-hotel.jpg', 'upload/events-Peshawar-serena-hotel.jpg', 'upload/meetingRoom-Peshawar-serena-hotel.jpg', 'upload/room4-Peshawar-serena-hotel.jpg', 'upload/sitting2-Peshawar-serena-hotel.jpg', 41),
(37, 'upload/Hotel_One_Mall_Road-logo-removebg-preview.png', 'Ali Gardazi', 'upload/One hotel swat-manager-picture.jpeg', 'upload/One-hotel swat-exterior.jpg', 'upload/One-hotel swat-dining2.jpg', 'upload/One-hotel swat-dining4.jpg', 'upload/One-hotel swat-room2.jpg', 'upload/One-hotel swat-room5.jpg', 'upload/One-hotel swat-room7.jpg', 42),
(38, 'upload/Pearl_Continental_Hotel-logo-removebg-preview.png', 'Nadeem Raiz Chaudhry', 'upload/Pearl Continental Hotel-manager-pic.jpeg', 'upload/PC-swat-exterior.jpg', 'upload/PC-swat-exterior2.jpg', 'upload/PC-swat-dining4.jpg', 'upload/PC-swat-dining.jpg', 'upload/PC-swat-room4.jpg', 'upload/PC-swat-sitting4.jpg', 43),
(39, 'upload/Fogland_Hotel_Nathia_Gali-logo-removebg-preview.png', 'Sultan Mahmood', 'upload/Fogland Hotel Nathia Gali-manager-picture.jpeg', 'upload/exterior-FoglandHotel-NathiaGali.jpeg', 'upload/exterior2-FoglandHotel-NathiaGali.jpeg', 'upload/room3-FoglandHotel-NathiaGali.jpeg', 'upload/room6-FoglandHotel-NathiaGali.jpeg', 'upload/sitting2-FoglandHotel-NathiaGali.jpeg', 'upload/room8-FoglandHotel-NathiaGali.jpeg', 44),
(40, 'upload/Hill_Top_Villa-hotel-logo-removebg-preview.png', 'Muhammad Jawad', 'upload/Hill Top Villa-hotel-manager.jpeg', 'upload/exterior-Hill-Top-Villa.jpg', 'upload/exteriorview-Hill-Top-Villa.jpg', 'upload/room1-Hill-Top-Villa.jpg', 'upload/room3-Hill-Top-Villa.jpg', 'upload/sitting-Hill-Top-Villa.jpg', 'upload/room5-Hill-Top-Villa.jpg', 45),
(41, 'upload/Hotel_Elites-logo-removebg-preview.png', 'Asif Ashfaq', 'upload/Hotel Elites-manager-picture.jpeg', 'upload/exterior-hotel-elites.jpg', 'upload/dining-hotel-elites.jpg', 'upload/room1-hotel-elites.jpg', 'upload/room2-hotel-elites.jpg', 'upload/sitting-hotel-elites.jpg', 'upload/dining2-hotel-elites.jpg', 46),
(42, 'upload/Lemon Lodges By Roomy, Nathiagali-logo.jpg', 'Saud Ahmad', 'upload/Lemon Lodges By Roomy, Nathiagali-manager.jpg', 'upload/exterior-Lemon-Lodges-By-Roomy.jpg', 'upload/exterior2-Lemon-Lodges-By-Roomy.jpg', 'upload/sitting5-Lemon-Lodges-By-Roomy.jpg', 'upload/dining-Lemon-Lodges-By-Roomy.jpg', 'upload/room9-Lemon-Lodges-By-Roomy.jpg', 'upload/sitting2-Lemon-Lodges-By-Roomy.jpg', 47),
(43, 'upload/Nathiagali Royal-logo.webp', 'Muhammad Faiq', 'upload/One hotel swat-manager-picture.jpeg', 'upload/exterior2-Nathiagali-Royal.jpg', 'upload/exterior-Nathiagali-Royal.jpg', 'upload/interior-Nathiagali-Royal.jpg', 'upload/room3-Nathiagali-Royal.jpg', 'upload/room5-Nathiagali-Royal.jpg', 'upload/sitting-Nathiagali-Royal.jpg', 48);

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `hotal_name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `hotal_name`, `description`, `city`, `price`, `image`) VALUES
(3, 'INDUS HOTEL', 'Experience seamless travel with our reliable car pick and drop service – your journey, our commitment.', 'HYDERABAD', 5000, 'upload/interior.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonail`
--

CREATE TABLE `testimonail` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `massage` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `occupation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonail`
--

INSERT INTO `testimonail` (`id`, `name`, `massage`, `image`, `occupation`) VALUES
(14, 'Hassan Alvi', 'I can\'t say enough good things about this website. Booking hotels here is a breeze, with competitive prices and an incredible range of options. The user-friendly interface and detailed hotel information, including customer reviews, make trip planning a breeze.', './Admin/Dashboard/upload/feedbackimg.jpeg', 'Software Engineer'),
(15, 'Abdullah Jafri', 'Booking a hotel has never been easier thanks to this online hotel booking website. The user-friendly interface makes it a breeze to find and reserve the perfect accommodation. With a vast selection of hotels, competitive prices, and detailed descriptions, it\'s a one-stop solution for all your travel needs.', './Admin/Dashboard/upload/pc-manager.jpg', 'Director of Serena Hotel'),
(16, 'Quratulain Nasir', 'Booking hotels online has never been this convenient. This website offers a wide array of accommodations at competitive rates, all at your fingertips. With real-time availability and instant confirmations, it streamlines the reservation process.', './Admin/Dashboard/upload/peshawar serena hotel-manager-pic.jpeg', 'Software Developer');

-- --------------------------------------------------------

--
-- Table structure for table `user-account`
--

CREATE TABLE `user-account` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userphone-no` varchar(50) NOT NULL,
  `userdob` date NOT NULL,
  `userpicture` text NOT NULL,
  `userpassword` varchar(50) NOT NULL,
  `userconfirm-password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user-account`
--

INSERT INTO `user-account` (`uid`, `username`, `useremail`, `userphone-no`, `userdob`, `userpicture`, `userpassword`, `userconfirm-password`) VALUES
(2, 'Hassan', 'hassan@gmail.com', '32543534353', '2006-11-22', '../Images/feedbackimg.jpeg', '12345', '12345'),
(5, 'Hassan', 'hassan@gmail.com', '32543534353', '2006-11-22', '../Images/feedbackimg.jpeg', '12345', '12345'),
(6, 'Abdul Samad', 'abdulsamad@gmail.com', '03193493076', '2004-12-17', './images/feedbackimg.jpeg', 'samad', 'samad');

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `massage` varchar(300) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_review`
--

INSERT INTO `user_review` (`id`, `name`, `massage`, `image`) VALUES
(1, 'Abdul Samad Alvi', 'random massage', '../Admin/Dashboard/upload/feedbackimg.jpeg'),
(4, 'Hashir Alvi', 'random massage', '../Admin/Dashboard/upload/pc-manager.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE `wedding` (
  `id` int(11) NOT NULL,
  `hotal_name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wedding`
--

INSERT INTO `wedding` (`id`, `hotal_name`, `description`, `city`, `price`, `image`) VALUES
(7, 'Serena Hotel, Islamabad', 'Experience seamless travel with our reliable car pick and drop service – your journey, our commitment.', 'ISLAMABAD', 10000, 'upload/serena-isl-exterior.jpg'),
(8, 'Luxus Grand Hotel, Lahore', 'Discover refined luxury in the heart of Islamabad at Serena Hotel. Luxus Grand Hotel is a 100 room property, equipped with 55 Deluxe Rooms, 20 executive rooms, 5 Super Executive Rooms, 16 family rooms and 2 Royal Suites. 3 Banquet halls / Conference ', 'LAHORE', 30000, 'upload/Luxus-Grand Hotel-exterior.jpg'),
(9, 'Ramada by Wyndham, Lahore', 'Ramada by Wyndham Lahore Gulberg II has a restaurant and a fitness centre in Lahore. This property is located a short distance from attractions such as Vogue Towers and Pace Shopping Mall. Attractions in the area include Wagah Border, 23 km away, or ', 'LAHORE', 50000, 'upload/Ramada-Lahore-exterior.jpg'),
(10, 'Avari Xpress, Multan', 'Avari Xpress Multan offers 4-star accommodations with a restaurant. The property has a 24-hour front desk, airport transportation, room service and free WiFi throughout the property. All guest rooms come with air conditioning, a flat-screen TV with c', 'MULTAN', 35000, 'upload/exterior-Avari- Xpress -Multan.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_carrental`
--
ALTER TABLE `booked_carrental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_hotel`
--
ALTER TABLE `booked_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_rental`
--
ALTER TABLE `car_rental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_reserve`
--
ALTER TABLE `event_reserve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityId` (`cityId`),
  ADD KEY `hotelid` (`hotelid`);

--
-- Indexes for table `hotel_details`
--
ALTER TABLE `hotel_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelid` (`hotelid`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonail`
--
ALTER TABLE `testimonail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user-account`
--
ALTER TABLE `user-account`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding`
--
ALTER TABLE `wedding`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booked_carrental`
--
ALTER TABLE `booked_carrental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `booked_hotel`
--
ALTER TABLE `booked_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `car_rental`
--
ALTER TABLE `car_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_reserve`
--
ALTER TABLE `event_reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `hotel_details`
--
ALTER TABLE `hotel_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonail`
--
ALTER TABLE `testimonail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user-account`
--
ALTER TABLE `user-account`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wedding`
--
ALTER TABLE `wedding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`cityId`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `hotels_ibfk_2` FOREIGN KEY (`hotelid`) REFERENCES `hotel_details` (`id`);

--
-- Constraints for table `hotel_details`
--
ALTER TABLE `hotel_details`
  ADD CONSTRAINT `hotel_details_ibfk_1` FOREIGN KEY (`hotelid`) REFERENCES `hotels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
