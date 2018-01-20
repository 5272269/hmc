-- Adminer 3.7.0 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+08:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `omp_addonarticle`;
CREATE TABLE `omp_addonarticle` (
  `aid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '关联主表的字段',
  `body` mediumtext,
  `userip` char(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `omp_addonarticle` (`aid`, `body`, `userip`) VALUES
(1,	'<p>测试呵呵呵呵</p>',	'2130706433'),
(2,	'<p>另一个测试</p>',	'2130706433'),
(3,	'<p class=\"en\">HMCFAMILY</p><h3>创家族传奇 立百世基业</h3><p>致力于为家族提供值得信赖的</p><p>全方位的家族事务管理服务，帮助家族实现可持续的</p><p>家族传承、合理安排传承规划，妥善保护家族传统。</p>',	'2130706433'),
(4,	NULL,	'2130706433'),
(5,	'<h3>HMCFamily Office as a leader in the Chinese Family Office industry, the HMCFamily Office is a bridge connecting successful Chinese families with the world’s top asset allocation resources. &nbsp;Employingthe “HMCFamily Inheritance and Management System”, &nbsp;customized for those families with ultra high net worth, &nbsp;the HMCFamily Office has set up a platform that offers a whole range of services geared to the global asset allocation, &nbsp;the protection of family assets, &nbsp;succession planning and the passing down of family tradition”.</h3>',	'1877081727'),
(6,	'<p style=\"text-align: left;\">With a deep understanding of ultra high net worth families’ wealth management goals, &nbsp;we can customize asset allocation plans and help them realize their wealth management and inheritance.</p><p><br/></p>',	'2084677202'),
(7,	'<p><span style=\"font-size: 18px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"></span></p><p><span style=\"color: rgb(149, 55, 52); text-align: justify; text-indent: 28px; font-family: Arial, sans-serif; line-height: 20px; font-size: 16px; background-color: rgb(255, 255, 255);\">Restoring the Ancient Way, Rebuilding the “Castle of the Mind”&nbsp;</span></p><p style=\"margin-top:8px;margin-right:0;margin-bottom:8px;margin-left:0;line-height:125%\"><span style=\"color: rgb(149, 55, 52); text-align: justify; text-indent: 28px; font-family: Arial, sans-serif; line-height: 20px; font-size: 16px; background-color: rgb(255, 255, 255);\">Returning to a Pure Mind<span style=\"color: rgb(149, 55, 52); font-family: Arial, sans-serif; font-size: 18px; line-height: 20px; text-align: justify; text-indent: 28px; background-color: rgb(255, 255, 255);\">,&nbsp;</span>Adopting the LEARN Lifestyle</span></p><p><br/></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">HMCFamily Office’s LEARN High-quality Lifestyle is a system that helps the decision maker of the family construct a system for recycling energy for the mind and body. It all starts from a wholesome lifestyle, and includes pursuing effective physical exercise, choosing between the desirable and undesirable, controlling the tempo of one’s actions, replenishing energies for the mind and body and, finally, realizing one’s dreams for life.</span></p><p><strong><span style=\"color: rgb(127, 127, 127); font-size: 16px;\"></span></strong></p>',	'1875045704'),
(8,	NULL,	'1877017371'),
(9,	NULL,	'1877017371'),
(10,	NULL,	'1877017371'),
(11,	NULL,	'1877017371'),
(12,	NULL,	'1877017371'),
(13,	NULL,	'1877017371'),
(14,	'<p class=\"en\">Concentration</p><h3>连接</h3><p>我们专注于家族传承</p>',	'2130706433'),
(15,	'<p style=\"text-align: left;\" dir=\"ltr\"><span style=\"font-size: 14px;\">The HMCFamily Global Selected Hedge Fund (hereinafter referred to as The HMCFamily Selected Fund ) is an optimal investment portfolio that is “all-weather, multi-category, multi-regional and multi-strategy”. It has beenestablished on the basis of the HMCFamily Investment Strategies for “Staying Wealthy for Centuries”.</span></p><p style=\"text-align: left;\" dir=\"ltr\"><span style=\"font-size: 14px;\"><span style=\"font-size: 14px;\">This is a FOF hedge fund traded in US dollars and investing in the world’s best hedge funds. The target net annual rate of return is 10%. The fund has little fluctuation. It is expected to create a safe harbor for preserving capital value in the offshore market and offer long-term steady returns regardless ofmarket conditions</span><span style=\"font-size: 14px;\">.</span></span></p><h4><strong><span style=\"font-size: 16px;\">Investment Principles</span></strong></h4><ul class=\" list-paddingleft-2\"><li><p style=\"text-align: left;\"><span style=\"font-size: 14px;\"><span style=\"color: rgb(149, 55, 52); font-family: Arial; font-size: 14px; line-height: 20px; text-align: justify; text-indent: 28px; background-color: rgb(255, 255, 255);\">Risk Reduction</span>: <span style=\"font-size: 14px; color: rgb(63, 63, 63);\">The HMCFamily Investment Strategies for “Staying Wealthy for Centuries” disperse category risks through diversified investment and spread regional risks through global investment.</span></span></p></li><li><p style=\"text-align: left;\"><span style=\"font-size: 14px;\"><span style=\"color: rgb(149, 55, 52); font-family: Arial; font-size: 14px; line-height: 20px; text-align: justify; text-indent: 28px; background-color: rgb(255, 255, 255);\">Return Increase</span>:&nbsp;</span><span style=\"font-size: 14px; color: rgb(63, 63, 63);\">The HMCFamily Investment Strategies for “Staying Wealthy for Centuries” separate income sources with a financial engineering model that respectively optimizes theβrevenue and αincome and ultimately builds a top investment portfolio with optimalβand customized α.</span></p><p><span style=\"font-size: 14px; color: rgb(63, 63, 63);\"></span></p></li></ul><p><span style=\"color: rgb(128, 36, 40); font-family: Arial; font-size: 14px; line-height: 32px; text-align: justify; background-color: rgb(255, 255, 255);\"><br/></span></p><p style=\"text-align: left;\"><span style=\"color: rgb(128, 36, 40); font-family: Arial; font-size: 14px; line-height: 32px; text-align: justify; background-color: rgb(255, 255, 255);\">The&nbsp;HMCFamily&nbsp;Office&nbsp;Investment Philosophy:&nbsp;The HMC Factor</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left;background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px; text-indent: 28px; font-family: Arial; color: rgb(149, 55, 52);\"><span style=\"line-height: 32px; font-size: 14px; text-indent: 28px; font-family: Arial; color: rgb(89, 89, 89);\"><span style=\"color: rgb(149, 55, 52); font-family: Arial; font-size: 14px; line-height: 32px; text-indent: 28px; background-color: rgb(255, 255, 255);\">The&nbsp;</span></span><span style=\"line-height: 32px; font-size: 14px; text-indent: 28px; font-family: Arial; color: rgb(149, 55, 52);\">HMC Factor </span><span style=\"line-height: 32px; font-size: 14px; text-indent: 28px; font-family: Arial; color: rgb(89, 89, 89);\"><span style=\"line-height: 32px; font-size: 14px; text-indent: 28px; font-family: Arial; color: rgb(149, 55, 52);\"><span style=\"color: rgb(89, 89, 89); text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"font-family: arial, helvetica, sans-serif;\">is the income-risk ratio, namely, the profit an investor gains for a unit of risk he bears. &nbsp;It is an international common indexmeasuring the performance of a fund against its peers. The HMC Factor indicates the true investment-return rate an institution brings for its clients (the income-risk ratio of a top-ranked global institution being 0.8 and that of a topdomestic one being 0.4). &nbsp;With the HMC Factor being the core DNA, the HMCFamily financial engineering model underpins the HMCFamily Investment Strategies for “Staying Wealthy for Centuries”, featuring “one risk, two returns”.</span></span></span></span></span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px; text-indent: 28px; font-family: Arial; color: rgb(89, 89, 89);\"></span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left;  background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px; text-indent: 28px; font-family: Arial; color: rgb(89, 89, 89);\">With the&nbsp;</span><span style=\"font-size: 14px; text-indent: 28px; font-family: Arial; color: rgb(149, 55, 52);\">HMC Factor,</span><span style=\"font-size: 14px; text-indent: 28px; font-family: Arial; color: rgb(89, 89, 89);\">&nbsp;the HMCFamily Office &nbsp;solves a challenging problem: Increasing investment yields while reducing risks. Thus, it completely removes any concerns investors may retain after they make an investment.</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: justify;background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial; color: rgb(128, 36, 40); font-weight: bold; font-size: 14px;\"></span></p><h4 style=\"white-space: normal;\"><strong><span style=\"font-size: 16px;\">Investment Strategy</span></strong></h4><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial; color: rgb(128, 36, 40); font-size: 14px;\">Looking for the Best β Funds</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial; color: rgb(89, 89, 89); font-size: 14px;\">The world’s best β funds selected by the HMC Family Financial Engineering Model allocate the risks brought by rises and falls in economic growth andinflation. Thus, the risks caused by the economic environment offset each other and the risk-premium-corresponding absolute returns remain . The clients can obtain long-term steady yields in any economic environment.</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left; line-height: 20px; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial; color: rgb(89, 89, 89); font-size: 14px;\"><br/></span></p><p style=\"text-align: center;\"><span style=\"font-family: Arial;color: rgb(102, 102, 102)\">&nbsp; &nbsp;&nbsp;</span><img src=\"/data/cms/upload_files/images/20160322/201603221458627952747.png\" title=\"201605241464077338906.png\" alt=\"201603221458627952747.png\"/></p><p><br/></p><p style=\"text-align: left;\"><span style=\"font-size: 14px;\"><span style=\"color: rgb(128, 36, 40);\">The Construction of Customized α Portfolio</span></span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left;  background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial; color: rgb(89, 89, 89); font-size: 14px;\">The HMCFamily Office selects the best α hedge funds from 6,500 such funds globally to disperse risks. With the accurate calculation offered by the global financial database, the HMCFamily Office builds a customized α portfolio based on the best &nbsp;β fund.</span></p><p style=\"font-family: Simsun;font-size: medium;white-space: normal;text-align: justify;line-height: 20px;background-color: rgb(255, 255, 255)\"><span style=\"font-family: Arial; color: rgb(89, 89, 89); font-size: 14px;\"><br/></span></p><p style=\"font-family: Simsun;font-size: medium;white-space: normal;text-align: justify;line-height: 20px;background-color: rgb(255, 255, 255)\"><span style=\"font-family: Arial;color: rgb(102, 102, 102)\">&nbsp;</span></p><p style=\"font-family: Simsun;font-size: medium;text-align: center;white-space: normal;line-height: 20px;background-color: rgb(255, 255, 255)\"><span style=\"font-family: Arial;color: rgb(102, 102, 102)\"><img src=\"/data/cms/upload_files/images/20160322/201603221458627966926.png\" title=\"201603221458627966926.png\" alt=\"构建定制化的α组合-EN.png\" style=\"width:324px;height:334px;\"/></span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; line-height: 20px; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial;color: rgb(102, 102, 102)\"><br/></span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; line-height: 20px; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial;color: rgb(102, 102, 102)\"><br/></span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal;  background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial; color: rgb(128, 36, 40); font-weight: bold; font-size: 16px;\"></span></p><h4 style=\"white-space: normal; text-align: justify;\"><strong><span style=\"font-size: 16px;\">The Optimal Portfolio</span></strong></h4><p style=\"font-family: Simsun; font-size: medium; white-space: normal;text-align: left; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial; color: rgb(128, 36, 40); font-size: 14px;\">The Yield Curve of the&nbsp;“Optimal HMCFamily Office Investment Portfolio”</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left;  background-color: rgb(255, 255, 255);\"><span style=\"text-align: justify; color: rgb(89, 89, 89); font-family: Arial; font-size: 14px;\">To comprehensively collect the return data of the “Optimal HMCFamily Office Investment Portfolio”, the HMCFamily Office has tracked the portfolio’s yield curve from 1996 to 2014. The cumulative rate of return (the optimal β funds and the customized α portfolio are combined according to their corresponding weight ) is 914%, the annualized return rate being 13%, the return fluctuation rate being 6.2% and the income-risk ratio being 2.1%.</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px;\"><span style=\"font-size: 14px; font-family: Arial; color: rgb(196, 189, 151);\">According to international standards, the funds with a&nbsp;</span><span style=\"font-size: 14px; font-family: Arial; color: rgb(149, 55, 52);\">HMCFactor &nbsp;(income-risk ratio)</span><span style=\"font-size: 14px; font-family: Arial; color: rgb(196, 189, 151);\">&nbsp;above 0.8 are excellent financial products. The income-ratio of the&nbsp;</span><span style=\"font-size: 14px; font-family: Arial; color: rgb(149, 55, 52);\">Optimal HMCFamily Office Investment Portfolio &nbsp;</span><span style=\"font-size: 14px; font-family: Arial; color: rgb(196, 189, 151);\">is 2.1 and represents 262% of the ratio stipulated in the international standard.</span></span></p><p style=\"font-family: Simsun;font-size: medium;white-space: normal;text-align: justify;line-height: 20px;background-color: rgb(255, 255, 255)\"><span style=\"font-size: 14px; font-family: Arial; color: rgb(196, 189, 151);\"><br/></span></p><p style=\"font-family: Simsun;font-size: medium;white-space: normal;text-align: justify;line-height: 20px;background-color: rgb(255, 255, 255)\"><span style=\"font-size: 14px; font-family: Arial; color: rgb(196, 189, 151);\"><br/></span></p><p style=\"text-align: center;\"><span style=\"font-family: Arial;color: rgb(102, 102, 102)\"><img src=\"/data/cms/upload_files/images/20160322/201603221458627982235.png\" title=\"201603221458627982235.png\" alt=\"Optimal-HMCFamily-Office-Investment-Portfolio.png\"/></span></p><p><span style=\"font-family: Arial;color: rgb(102, 102, 102)\"><br/></span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left; line-height: 20px; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial; font-size: 10px;\">Note: Historical return data from independent valuation and weight construction are used for determining the weight of all the hedge funds in theOptimal HMCFamily Office Investment Portfolio. The customized α portfolio and the weight will change with time.</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left; line-height: 20px; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial\"><br/></span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px; font-family: Arial; color: rgb(102, 102, 102);\"><span style=\"color: rgb(89, 89, 89); font-family: Arial; font-size: 14px; line-height: 32px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(102, 102, 102); font-family: Arial; font-size: 14px; line-height: 32px; background-color: rgb(255, 255, 255);\">The value of the “Optimal HMCFamily Office Investment Portfolio” has been proved through out the Asian financial crisis, &nbsp;the bursting of the dotcom bubble, the US financial crisis and the European sovereign debt crisis, eventsthat had global impacts.</span></span></span></p><p style=\"font-family: Simsun;font-size: medium;white-space: normal;text-align: justify;line-height: 20px;background-color: rgb(255, 255, 255)\"><br/></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left;background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px; font-family: Arial; color: rgb(128, 36, 40);\">The&nbsp;“Optimal HMCFamily Office Investment Portfolio”&nbsp;with Customized Prospective Yield</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px; font-family: Arial; color: rgb(89, 89, 89);\">In response to specific needs of investors, the &nbsp;HMC Family Office raised the fluctuation rate of the &nbsp;“Optimal HMCFamily Office Investment Portfolio” to 8%, 10% and 12%. &nbsp;The annualized return rate was respectively 16.8%, 21.0% and 25.2%.</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px; font-family: Arial; color: rgb(89, 89, 89);\">Due to the influence of the HMCFamily Factor, &nbsp;the &nbsp;“Optimal HMCFamily Office Investment Portfolio” &nbsp;can truly realize customized risks and returns. The “Optimal HMCFamily Office Investment Portfolio” , &nbsp;will offer you a customized investment portfolio through adjusting bearable risks to meet your specific investment demands; &nbsp;that is, &nbsp;the target return rate.</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"font-size: 12px;font-family: Arial;color: rgb(102, 102, 102)\">&nbsp;<img src=\"/data/cms/upload_files/images/20160701/201607011467366119979.jpg\" title=\"201607011467366119979.jpg\" alt=\"201605251464166615195.jpg\"/></span></p><p style=\"font-family: Simsun;font-size: medium;white-space: normal;text-align: justify;line-height: 20px;background-color: rgb(255, 255, 255)\"><span style=\"font-family: Arial; font-size: 10px; line-height: normal; text-align: left;\"><br/></span></p><p style=\"font-family: Simsun;font-size: medium;white-space: normal;text-align: justify;line-height: 20px;background-color: rgb(255, 255, 255)\"><span style=\"font-family: Arial; font-size: 10px; line-height: normal; text-align: left;\">Disclaimer: The historical returns in the above portfolio do not represent the future realizable earnings and do not constitute an offer to any institutions or any individuals to subscribe to any financial products from HMCFamily.</span><br/></p>',	'2084677202'),
(19,	'<p class=\"en\">Charity</p><h3>家族慈善</h3><p>家族慈善捐赠咨询服务</p><p>优质慈善资源对接服务</p><p>家族慈善项目设计服务</p>',	'1872841211'),
(16,	'<p><span style=\"font-size: 14px;\">Fixed Income Fundsare special funds set up for those extremely ultra high net worth families whose assets are more than 1 billion U.S. dollars, and mainly invest in more stable and lower-risk funds, including priority private equity funds, fixed income trust programs and bond funds.</span></p><p><br/></p><h4><strong><span style=\"font-size: 16px;\">Investment Philosophies</span></strong></h4><ul class=\" list-paddingleft-2\"><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Alternative assets are important strategic investments in a portfolio. </span></p></li><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Alternative investments have little relationship to such traditional assets as stocks and bonds. </span></p></li><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Alternative assets can still produce long-term returns during economic downturns.</span></p></li></ul><p><br/></p><h4><strong><span style=\"font-size: 16px;\">Investment Strategies</span></strong></h4><ul class=\" list-paddingleft-2\"><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Opportunity Investment: Focuses on innovative alternative assets in segmented industries.</span></p></li><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Portfolio Investment: Invests in a variety of alternative funds to realize sound returns.</span></p></li><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\"><span style=\"color: rgb(89, 89, 89); font-size: 14px;\"><span style=\"font-size: 14px;\">Scarce Fund Investment: Some capital is invested in scarce alternative funds.</span>&nbsp;</span></span></p></li></ul><p><br/></p><h4><strong><span style=\"font-size: 16px;\">Subscription Process</span></strong></h4><ul class=\" list-paddingleft-2\"><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Reservation and Ordering </span></p><p><span style=\"font-size: 14px;\">Information on the underlying fundamentals of each fund</span></p><p><span style=\"font-size: 14px;\">Select a fund and make a reservation</span></p><p><span style=\"font-size: 14px;\">Customer service contacts you to confirm your subscription</span></p><p><br/></p></li><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Product Consultation </span></p><p><span style=\"font-size: 14px;\">Make an appointment for product consultation</span></p><p><span style=\"font-size: 14px;\">Select a fund management team to provide product consultation service</span></p><p><span style=\"font-size: 14px;\">Confirm your fund subscription intention</span></p><p><br/></p></li><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Agreement Signing and Payment </span></p><p><span style=\"font-size: 14px;\">Sign the Fund Subscription Agreement</span></p><p><span style=\"font-size: 14px;\">Provide the funds for your subscription</span></p><p><span style=\"font-size: 14px;\">The fund subscription is completed.</span></p></li></ul><p><br/></p>',	'2084677202'),
(17,	'<p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">These are special funds established for families whose assets exceed US$1 billion and can integrate the scarce resources available in the alternative capital market. They focus on instruments such as hedge funds, art funds, private equity funds, venture capital funds and real estate funds, among others.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">The emerald is praised as the “king of jade”. It is an ideal collectible due to its stable internal structure and small size. The top jewelry, including pendants, rings and necklaces, are carved from selected raw jadeite, which can be worn, collected or handed down for posterity.&nbsp;</span></p>',	'2084677202'),
(102,	NULL,	'2084677202'),
(103,	NULL,	'2084677202'),
(104,	NULL,	'2084677202'),
(105,	NULL,	'2084677202'),
(106,	NULL,	'2084677202'),
(107,	NULL,	'2084677202'),
(108,	NULL,	'2084677202'),
(109,	NULL,	'2084677202'),
(110,	NULL,	'2084677202'),
(111,	NULL,	'2084677202'),
(112,	NULL,	'2084677202'),
(18,	'<p class=\"en\">Wealth Preservation</p><h3>家族财富保障</h3>',	'1872841211'),
(20,	'<p>HMCFamily Office consultants and resources provide you with comprehensive and professional advice and consultation and help you enhance the social influence of your family as your exclusive charity advice partner.</p>',	'2084677202'),
(21,	'<ul class=\" list-paddingleft-2\"><li><h5 style=\"text-align: left;\">Quality Charitable Resource Undertaking</h5><p style=\"text-align: left;\">Provide practical suggestions and plans as to where the money should go and how it should be paid to the charity.Recommend suitable recipients to ensure donations reach their target.</p></li><li><h5 style=\"white-space: normal; text-align: left;\">Charitable Donation Consultation</h5><p style=\"white-space: normal; text-align: left;\">Identify and contact outstanding public welfare projects or executive teams.Provide charitable programs or recommendation reports of executive teams and arrange contact between the parties.</p></li><li><h5 style=\"text-align: left;\">Charitable Project Design Service</h5><p style=\"text-align: left;\">Design charitable projects or events suited to the core concepts of ultra high net worth Chinese families’ culture.Provide project design and detailed implementation plans.</p></li></ul>',	'1877081727'),
(22,	'<h3 style=\"text-align: justify;\"><span style=\"font-size: 14px;\">EV Foundation is devoted to promoting the sustainable development of public welfare, building a benevolent and caring society with positive energy and establishing an exchange platform of charity development for ultra-high net worth Chinese families. With building social “positive energy” as our mission, the foundation is aimed at encouraging the construction of a good social environment through funding programs that promote healthy social trends and achieve long-term benefits. Through the establishment of an international platform of charity exchange, EV Foundation is committed to encouraging prominent Chinese families and new philanthropists to participate in sustainable charity causes.</span></h3><h4 style=\"text-align: justify;\"><strong><span style=\"font-size: 16px;\">Mission Statement</span></strong></h4><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">EV Foundation is devoted to promoting the sustainable development of charity, building a benevolent and caring society with positive energy, and establishing an exchange platform for charity development for successful Chinese families. </span></p><h4 style=\"text-align: justify;\"><strong><span style=\"font-size: 16px;\">Guiding Principles</span></strong></h4><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Provide charitable support to ongoing causes, such as education, the disabled, orphans, health care, environmental protection, etc. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Advocate care and compassion through funding projects beneficial to promoting healthy social trends and long-term benefit. With building social “positive energy”as our mission, the foundation aims to encourage the construction of a good social environment. <br/></span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Build an international platform of charity exchange and lead ultra-high net worth Chinese families and new philanthropists to participate in the public welfare cause. </span></p><h4 style=\"text-align: justify;\"><strong><span style=\"font-size: 16px;\">The Founding of EV Foundation</span></strong></h4><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">As the founder of China Care Home, Matthew A. Dalio sowed the seeds for EV Foundation as early as 2001. Matthew was named one of the 20 most outstanding American teenagers by famous magazine Teen People— at the age of only 11. He loved China at once when he first came here with hopes to help Chinese disabled orphans live a good life. On March 19, 2002, China Care Home donated its first US$50,000 to Tianjin Children’s Welfare Institute and China Charity Federation. Since then, more than 1,300 disabled orphans have been helped by China Care Home. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">What Matthew did moved Yang Hui and his wife, who had also been actively contributing to charity. In 2012, the Yang couple founded a first-level public welfare charity special fund called Care Fund, dedicated to helping Chinese orphans and disabled children. Yang Hui has always advocated for the adoption of “positive energy” by individuals and enterprises and “making the world better by delivering positive energy”. After two years’ efforts, Care Fund created an independently designed public welfare project called “Lighting Hope with Care”, which played an important role in establishing a standardized development model for Chinese non-governmental disabled orphan aid organizations. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">In April 2014, the Yangs donated more than ¥2.13 million to China Care Home, helpingit support more Chinese disabled orphans. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">From October 2012 till now, Mr. Yang Hui and his wife, Ms. Zhai Jiayi, have successfully held two charity galas called “Angels’ Night” and raised more than ¥6 million, which was donated to five disabled orphan institutions and charity organizations. The Yangs have together donated millions of yuan so far.In addition, they have organized six on-site investigations into the needs of grassroots disabled orphan relief organizations and enlisted 87 volunteers to provide a total of 1,072 hours’ service. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Based on what they’ve achieved in “Care Fund”, Yang Hui and his wife decided to set uptheir own family foundation in order to help those in need and support positive social energy through the power of public welfare. EV Foundation regards the inheritance of family charity as its mission and will play its part in the field of philanthropy to repay society. </span></p><h4 style=\"text-align: justify;\"><strong><span style=\"font-size: 16px;\">Ceremony Establishes EV Foundation</span></strong></h4><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\"></span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">At 7 p.m. on July 17 (American time), a grand ceremony establishing EV Foundation was held in the Belle Haven, a private club. The same evening, a theme dinner called “Creating Tradition through Giving Back” followed right after a Sino-American Top Families Closed Roundtable Forum hosted by the HMCFamily Office. &nbsp;</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">That evening, celebrities from China and the U.S. gathered in the moonlight beside ablue and calm sea and witnessed the formal establishment of EV Foundation by HMCFamily Office founder Yang Hui and his wife, Zhai Jiayi. It may be the “youngest” family foundation in China, but it’s also the first transnational charity platform for interaction and exchange between Chinese and overseas wealthy families. Meanwhile, it has lofty aspirations: to promote the sustainable development of public welfare and assist super-wealthy Chinese families to create their own charity legacy. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">The charity dinner started with beautiful rhythmic music played by famous Chinese Guqin musician Chen Leiji after uplifting opening remarks from guest host Rupert Hoogewerf. The quiet and distant atmosphere created by the Chinese Guqin added a unique element embedded in traditional culture that declares “the highest good is like that of water”. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Wang Zhenyao, President of the China Philanthropy Research Institute, delivered a lively speech. As someone very familiar with Yang Hui and Zhai Jiayi, Wang praised the young couple, saying their similar ideals and beliefs are demonstrated in their devotion to charity as well as their enterprise. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">“They’ve continuously worked to help orphans and disabled children. What moves me more is that they went to the remote mountainous areas in Central China on fact-finding missions for the sole purpose of building a standardized project that can bring a better life for Chinese disabled orphans. Every time I have heard Yang and Zhai talking about their care for children, they spoke with enthusiasm,” Wang said. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">This youthful family foundation was named by choosing one Chinese character respectively from each of the couple’s names. Wang said: “Interestingly, the theme of the establishment ceremony and the charity dinner is also homophonic, ‘Creating Tradition by Giving Back’. They build a good bridge for exchange between China and the U.S. I hope the charity cause can cross national borders and gain greater development.”</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">In conclusion, Wang said, “Mr. Rivers told me that charity has changed his children and integrated his business with China. We’ve never expected philanthropy to be so attractive in making entrepreneurs consciously take up their social responsibilities as well as help increase their enterprises’ influence.” </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">As a partner of EV Foundation, Karen Jean, the founder of “New Day Foster Home”, a non-governmental charity organization, also expressed her excitement and gratitude about the establishment of EV Foundation. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">After the speech and in the soft evening breeze, all the Chinese and American guests hung red ribbons onan evergreen tree. The colorful ribbons were symbols of good wishes and also witnessed the propitious birth of EV Family Foundation. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Yang Hui and Zhai Jiayi have declared EV Foundation will be committed to its mission of promoting the sustainable development of charity, building a benevolent and caring society with positive energy and establishing an exchange platform for prominent Chinese families in the future. The foundation will support ongoing public welfare causes including education, disabled orphans, health care and environmental protection, etc. Through aidprojects that promote healthy social trends and long-term benefit, the foundation will advocate the concepts of care and compassion, promote the construction of “positive energy” and encourage the building of a good social environment. At the same time, it will build an international charity platform to encourage wealthy Chinese families and new philanthropists to participate in the public welfare cause. </span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">The foundation aims to be the most professional family charity organization that captures the innovation and vitality of youth. EV Foundation, the first such venture under a Family Office in China, is continuously popularizing its guiding principle of “creating tradition by paying back”.</span></p>',	'2084677202'),
(73,	NULL,	'2099736842'),
(74,	NULL,	'2099736842'),
(75,	NULL,	'2099736842'),
(76,	NULL,	'2099736842'),
(77,	NULL,	'2099736842'),
(78,	NULL,	'2099736842'),
(29,	'<p class=\"en\">Research Institute</p><h3>漢家族研究院</h3>',	'2099736842'),
(23,	'<p><span style=\"font-size: 14px;\">Care Foundation was formally founded by Mr. Yang Hui, President of the HMCFamily Office, and his wife in July 2012. It is a first-level special fund under the Zhongshe Social Work Development Foundation.</span></p><p><span style=\"font-size: 14px;\">Care Foundation is committed to organizing a range of resources to support non-governmental charity institutions caring for disabled orphans and cooperating with hospitals, universities and professional organizations to explore and analyze the standard of care and support provided to China’s disabled orphans. The fund also is devoted to building the most effective aid model through training social workers, and enhancing the general public’s awareness of the need to helpdisabled orphans through public campaigns.</span></p>',	'2084677202'),
(24,	'<ul class=\" list-paddingleft-2\"><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Donate to non-governmental disabled orphan adoption agencies; </span></p></li><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Explore and analyze the existing support system fordisabled orphans; </span></p></li><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Build an effective non-governmental model foraiding disabled orphans;</span></p></li><li><p><span style=\"color: rgb(89, 89, 89); font-size: 14px;\">Raise public awareness of the need to save and supportdisabled orphans in China. </span></p></li></ul>',	'2084677202'),
(25,	'<p><span style=\"font-family: arial, helvetica, sans-serif; color: rgb(102, 102, 102); font-size: 14px;\"></span><span style=\"font-size: 14px;\">Care Foundation has since its launch focused closely on children in need, especially disabled orphans. It will fully explore and organize quality social resources to participate in the establishment and widespread adoption of non-governmental standards related to saving and assisting disabled orphans. It will continue to make efforts to effectively support those non-governmental children’said organizations and improve the living environment of Chinese disabled orphans.</span><span style=\"font-family: arial, helvetica, sans-serif; color: rgb(102, 102, 102); font-size: 14px;\"></span></p><p><br/></p>',	'2084677202'),
(26,	NULL,	'2130706433'),
(27,	NULL,	'2130706433'),
(28,	NULL,	'2130706433'),
(30,	'<p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">For ultra high net worth Chinese families, the ongoing economic globalization is an unprecedented challenge,but also an opportunity.They need optimal international practice strategies to manage their enterprises so they can expand their businesses into overseas markets, keep domestic and overseas assets independent of each other and deal with the multi-jurisdiction tax system. At the same time, their social responsibilities are also steadily increasing in line with their greater influence. In the ten years ahead, ultra high net worth families’ enterprises will pass into the hands of the next generation, but it remains a critically important question as to how to maintain the cohesive force of the family and ensure the inheritance process is smooth. In short, how do we realize the sustainable succession of a business empire?</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">As we know, more than 80% of jobs in China currently are created by private enterprises and the rate will rise in the future. Hu Xueyan and Shi Zhengrong are two examples of highly successful Chinese business leaders in the modern era who lost their wealth for various reasons. If 70% of privatelyrun enterprises can’t be successfully handed down to the next generation, the Chinese economy will suffer. In addition, nearly 70% of Chinese household savings are possessed by wealthy privateenterprise-owning families. Most of their wealth has been earned through their own hard work, and its loss would be a source of great pain to them.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">For many prominent families in the world, the Family Office becomes an indispensable core institution once their family enterprise grows big enough. A Family Office can provide them with professional family inheritance plans, as well as hundreds of services directly or indirectly related to wealth, such as asset allocation, children’s education and health management services they really need, so it plays an important part in these people’s lives. It is a genuine family “CEO”. The Family Office industry has existed in Western countries for a long time. It is a professional organization providing private, high-end and customized services to ultra-rich families. In China, the Family Office is still a new concept, but that doesn’t mean prominent Chinese families don’t need it. In fact, the requirements of China’s rich for asset liquidity, immigration and diversified asset allocation are much higher than those of their Western counterparts. However,a Family Office model directly copied from the West may not to be suited to the local market due to various differences, and it therefore would notwork well in solving the practical problems arising in family inheritance.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Yang Hui, the founder of HMCFamily Office, has devoted himself to studying the Family Office industry since 2009. He introduced the Family Office business model and service system to China from the U.S. and localized it by establishing the first Family Office conforming to international standards in China. In addition, he and the HMCFamily Office staff spent half a year in 2014 inviting famous international Family Office experts to share their knowledge and establishing a set of service systemstailored to the demands of ultra-rich Chinese families. Thus, the first Chinese Family Office Industry White Paper,with the mission of “creating a family legacy and establishing an everlasting enterprise” came into being. The emergence of this White Paper is undoubtedly good news for the ultrahighnetworth Chinese families. Why?</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">The HMCFamily Office has developed for ultra high net worth families “the wealth ecosystem”, which combines mature Western family inheritance plans with characteristics that address Chinese needs, and integrating products, services and advice. In such a system, the Family Office isn’t the only organization serving ultrahighnetworth Chinese families. Other organizations, including banks, trust companies, law firms, accounting firms and privatelyoffered funds, all work for ultra high net worth families directly or indirectly to realize sustainable family inheritance. The HMCFamily Office has also developed the concept of a “3+1+1 Service Platform”, which means the HMCFamily Office cares not only about people’s tangible assets but also their intangible assets, such as health, children’s education, family harmony and family inheritance, etc. This type of service has two distinctive features. First, it is highly customized. Plans are made in accordance with the families’ different situations and the global political and economic environment. At the same time, the custom-made “Family Inheritance and Management System” is based on a comprehensive understanding of each family’s situation. Of course, all the information is kept strictly confidential. We aim to make successors happy, as well as helping them inherit the family money, stock rights and other various assets. After all, wealth is supposed to bring people joy and happiness,not stress, worries and fatigue. The second feature is systematic quality management, which guarantees the quality of family inheritance. Just like 3D printing, it’s a very complicated process but standardized to ensure quality. In other words, the system is not as simple as establishing an asset management or family inheritance plan.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">As the first White Paper in this industry in the world, the Chinese Family Office Industry White Paper not only offers a clear description of what a Family Office should be and provides standard specifications, it also establishes a benchmark and sets up a supporting system for family inheritance for the wealthy. At the same time, it also provides direction for the whole industry in helping more and more prominent Chinese families realize the goal of “creating a family legacy and establishing an everlasting enterprise”.</span></p><p><br/></p><p style=\"text-align: right;\"><span style=\"font-size: 14px;\">Yang Hui</span></p><p style=\"text-align: right;\"><span style=\"font-size: 14px;\">January, 2015</span></p>',	'2084677202'),
(31,	'<p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">For ultra high net worth Chinese families, the ongoing economic globalization is undoubtedly an unprecedented challenge, but also an opportunity. With the rapid globalization of the Chinese economy and the deepening of reform and opening-up, the top echelon of financially successful Chinese families need to have a clear understanding of the domestic and international situation so they can apply a globalized vision in deciding the future direction of their development.\n &nbsp;&nbsp;</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">At present, excess supply constitutes a principal contradiction in the global economy. In industrial production in particular, a global aggregate demand deficiency is the main problem for both upstream raw material exploitation and midstream manufacturing and processing. In the 1970s and 1980s, the global population was still rising rapidly and that provided an important basis for the investment demand per capita of emerging countries, of which China is a leading representative, 20 years later. However, a gradual deterioration in population structure has resulted in a shortfall in total demand.\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Will this situation improve in a few years? That’s a question asked by many entrepreneurs. After all, based on the cyclical changes traditional industries have gone through in the past 20 years, this recessionary economy shouldn’t last long, either. But unfortunately, traditional industries are not going through a simple periodic variation this time, but a shock caused by competition from new business models. Such a structural change will introduce creative destruction to many traditional industries.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Accordingly, ultra high net wealth Chinese families will have to experience this new economic normal. In contrast to the 10-12% annual growth previously enjoyed, China’s GPD growth rate will drop to 5-7%. With the increasing industry competition, many family enterprises are suffering from overcapacity, and they’ll have to transfer from “old economy” to “new economy” industries. Thus, these enterprises will face great challenges in the process of reforming.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">In the complex and volatile international environment, the European debt crisis isn’t over yet and the US economic recovery remains to be confirmed. Furthermore, the structural rebalancing in China and the massive impact of the emergence of new technologies and industries all over the world are placing new demands on high-wealth Chinese families.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">In the 5 to 15 years to come, about 90% of the first generation of Chinese wealth creators will be faced with the challenge of preserving and growing their family wealth. As the first generation to pass down their wealth, they have no precedent or previous experience to follow. This is as big a challenge as any they’ve overcome in the past 30 years to accumulate their wealth and create business miracles.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">If they can negotiate this challenge smoothly, it will help them lay a solid foundation for their business empire. Otherwise, what they’ve created may disappear.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Fortunately, with the development of information globalization, ultra high net worth Chinese families now can access experience in preserving and growing family wealth from other countries. Some rich families in North American and Europe have broken the long-believed curse that “a rich family can’t maintain its wealth for more than three generations” and have passed down their wealth to the 4th and even the 5th generation. Undoubtedly, the inheritance system established in the process will help preserve and grow their family wealth for more generations in the future. Despite the different political and economic situations of different times, there are some common rules for rich families to follow to build a sustainable family succession structure.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Since 2012, HMCFamily Office has visited the US many times to communicate with prominent families there. Now, HMCFamily Office has successfully introduced the American Family Office business model into China, tailoring it to meet the current economic environment in China and local clients’ demands perfectly. With the customized and comprehensive solutions provided to ultra high net worth Chinese families, HMCFamily Office is devoted to becoming their close partner to ensure their family wealth and tradition are properly preserved and help them to “create a family legacy and establish an everlasting enterprise”.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">We believe that only with HMCFamily Office’s help, with its focus on preparing at the source and systematic planning for the long term, can successful Chinese families pass down their family wealth smoothly and harmoniously from generation to generation. And only in this way can they properly deal with all the predictable and unpredictable factors that will arise in the process of inheritance and make sure their family achievements last as long as possible.</span></p>',	'2084677202'),
(32,	'<p><span style=\"font-size: 14px;\"></span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">There’s a well-known Chinese saying that goes,“a rich family can’t maintain its wealth for more than three generations”. In fact, that saying is not totally groundless. A family business study made by J. Astrachan indicates that 30% of family enterprises can survive to the 2nd generation, 9% to the 3rd but only 3% to the 4th. The study shows that intergenerational succession can be the leading killer of wealth unless there is careful planning and arrangements.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">It’s been more than 30 years since the reform and opening-up policy was implemented in China. During this period, many economic miracles have occurred and plenty of wealth has been created. As “the first generation of wealth creators”, today’s ultra-highnetworth individuals have been able to enjoy their current wealth and social status after overcoming many challenges. As the first group of people to take advantage of reform, they were the first to accumulate enormous wealth. Likewise, they’ll be the first to face the challenge of safeguarding and handing down their wealth to the next generation. The cost of failing to do so, however, is also extremely high. In the 5 to 15 years to come, about 90% of the first generation of Chinese &nbsp; wealth creators will be faced with the challenge of preserving and growing their family wealth. As the first generation to pass down their wealth, they have no precedent or previous experience to follow. In these circumstances, their chance of successfully passing down their family wealth to posterity is unlikely to reach 30%.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">On top of that, this first generation of ultra-highnetworth Chinese will have to experience this new economic normal. In contrast to the 10-12% annual growth previously enjoyed, China’s GPD growth rate will drop to 5-7%. With the increasing industry competition, many family enterprises are suffering from overcapacity, and they’ll have to transfer from “old economy” to “new economy” industries. Thus, these enterprises will face great challenges in the process of reforming.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Fortunately, with the development of information globalization, ultra high net worth Chinese families now can access experience in preserving and growing family wealth from other countries. Some rich families in North American and Europe have broken the long-believed curse that “a rich family can’t maintain its wealth for more than three generations” and have passed down their wealth to the 4th and even the 5th generation. Undoubtedly, the inheritance system established in the process will help preserve and grow their family wealth for more generations in the future. Despite the different political and economic situations of different times, there are some common rules for rich families to follow to build a sustainable family succession structure.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">These rules include: the desire to pass down the family fortune from generation to generation; changing the mode of thinking, whereby family inheritance doesn’t only mean passing down the family-owned enterprise and wealth to the next generation; and, even more importantly, institutionalizing a “family inheritance culture” in family members’ dailybehavior through overall planning, proper family discipline and equitable legal and family management structures.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">The secret weapon to achieving the above purpose is the Family Office. Ultra-highnetworth Chinese will be more likely to avoid making mistakes and succeed in passing on their legacy if they adopt the professional advice of Family Office experts, make family inheritance plans and carry them out.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">The HMCFamily Office once analyzed the cases of more than 40 super-rich families in the world with Rupert Hoogewerf. The names of these families or enterprises have become a synonym for wealth, success and fame. Every family has a story of creating its family legacy and establishing an everlasting enterprise to share.</span></p><p style=\"text-align: justify;\"><span style=\"font-size: 14px;\">Let’s discoverthose families’ secret of “staying rich for more than three generations”.</span></p><p><span style=\"font-size: 14px;\"></span><br/></p>',	'2084677202'),
(33,	'<p class=\"en\">LEARN Life</p><h3>家族LEARN生活</h3>',	'2084677202'),
(34,	'<ul class=\"clearfix container list-paddingleft-2\"><li><p style=\"text-align: center; margin-top: 5px; margin-bottom: 15px;\"><span style=\"font-size: 18px;\"><strong>Lifestyle</strong></span></p><h3 style=\"text-align: center; margin-top: 5px; margin-bottom: 5px;\"><span style=\"font-size: 16px;\">Be the master of our own</span></h3><h3 style=\"text-align: center; margin-top: 5px; margin-bottom: 5px;\"><span style=\"font-size: 16px;\"> lives instead of changing</span></h3><h3 style=\"text-align: center; margin-top: 5px; margin-bottom: 5px;\"><span style=\"font-size: 16px;\"> with the tide.&nbsp;</span></h3></li><li><p style=\"text-align: center; margin-top: 5px; margin-bottom: 15px;\"><strong><span style=\"font-size: 18px;\">Exercise<br/></span></strong></p><h3 style=\"text-align: center; line-height: normal; margin-top: 10px; margin-bottom: 15px;\"><span style=\"font-size: 16px;\">Exercise and strengthen</span></h3><h3 style=\"text-align: center; line-height: normal; margin-top: 10px; margin-bottom: 15px;\"><span style=\"font-size: 16px;\">our &nbsp;body &nbsp;instead &nbsp;of</span></h3><h3 style=\"text-align: center; line-height: normal; margin-bottom: 10px; margin-top: 5px;\"><span style=\"font-size: 16px;\">indulging in laziness.</span></h3></li><li><p style=\"text-align: center; margin-top: 5px; margin-bottom: 15px;\"><span style=\"font-size: 18px;\"><strong>Attitude</strong></span></p><h3 style=\"text-align: center; margin-bottom: 5px; margin-top: 5px;\"><span style=\"font-size: 16px;\">Be peaceful and modest</span></h3><h3 style=\"text-align: center; margin-top: 5px; margin-bottom: 10px;\"><span style=\"font-size: 16px;\">instead of being arrogant.</span></h3><h3 style=\"text-align: center; margin-bottom: 5px; margin-top: 5px;\"><br/></h3></li><li><p style=\"text-align: center; margin-bottom: 15px; margin-top: 5px;\"><strong><span style=\"font-size: 18px;\">Recreation</span></strong></p><h3 style=\"text-align: center; margin-top: 5px; margin-bottom: 5px;\"><span style=\"font-size: 16px;\">Adoptproactive and healthy</span></h3><h3 style=\"text-align: center; margin-top: 5px; margin-bottom: 5px;\"><span style=\"font-size: 16px;\">recreation &nbsp;that &nbsp;generates</span></h3><h3 style=\"text-align: center; margin-top: 5px; margin-bottom: 5px;\"><span style=\"font-size: 16px;\">energy &nbsp;instead &nbsp;of &nbsp;giving</span></h3><h3 style=\"text-align: center; margin-top: 5px; margin-bottom: 5px;\"><span style=\"font-size: 16px;\">&nbsp; &nbsp;in &nbsp; to &nbsp; indolence.</span><span style=\"font-size: 14px;\">&nbsp;</span></h3></li><li><p style=\"text-align: center; margin-top: 5px; margin-bottom: 15px;\"><span style=\"font-size: 18px;\"><strong>Nutrition</strong></span></p><h3 style=\"text-align: center; margin-bottom: 5px; margin-top: 5px;\"><span style=\"font-size: 16px;\">Feed your mind with</span></h3><h3 style=\"text-align: center; margin-bottom: 5px; margin-top: 5px;\"><span style=\"font-size: 16px;\"></span><span style=\"font-size: 16px;\">nutrition &nbsp;</span><span style=\"font-size: 16px;\">instead &nbsp;of</span></h3><h3 style=\"text-align: center; margin-bottom: 5px; margin-top: 5px;\"><span style=\"font-size: 16px;\">turn</span><span style=\"font-size: 16px;\">ing&nbsp;</span><span style=\"font-size: 16px;\">it&nbsp;</span><span style=\"font-size: 16px;\">into a desert.&nbsp;</span></h3></li></ul>',	'2084677202'),
(35,	'<p>\r\n						2014年9月9日晚，有着亚洲品牌年度“奥斯卡”之称的第9届“亚洲品牌盛典”活动在香港亚洲电视台圆满落幕，作为中国第一家\r\n						符合国际标 准的家族办公室——漢•家族办公室荣获“亚洲品牌十大创新企业”大奖，这是中国家族办公室行业里，唯一获得此项\r\n						殊荣的企业。					</p><p>\r\n					<img src=\"http://hanjia.com/html/img/detail_pic.jpg\"/>\r\n					</p><p>第七届亚太财富管理与私人银行年会</p><p>\r\n					</p><h4>24岁的中国人成为世界上最年轻的亿万富豪</h4><p>\r\n					</p><p class=\"img_produce\">\r\n						2014年9月9日晚，有着亚洲品牌年度“奥斯卡”之称的第9届“亚洲品牌盛典”活动在香港亚洲电视台圆满落幕，作为中国第一家符\r\n						合国际标 准的家族办公室——漢•家族办公室荣获“亚洲品牌十大创新企业”大奖，这是中国家族办公室行业里，唯一获得此项殊荣\r\n						的企业。2014年9月9日晚，有着亚洲品牌年度“奥斯卡”之称的第9届“亚洲品牌盛典”活动在香港亚洲电视台圆满落幕，作为中国\r\n						第一家符合国际标 准的家族办公室——漢•家族办公室荣获“亚洲品牌十大创新企业”大奖，这是中国家族办公室行业里，唯一获得\r\n						此项殊荣的企业。2014年9月9日晚，有着亚洲品牌年度“奥斯卡”之称的第9届“亚洲品牌盛典”活动在香港亚洲电视台圆满落幕，\r\n						作为中国第一家符合国际标 准的家族办公室——漢•家族办公室荣获“亚洲品牌十大创新企业”大奖，这是中国家族办公室行业里，\r\n						唯一获得此项殊荣的企业。2014年9月9日晚，有着亚洲品牌年度“奥斯卡”之称的第9届“亚洲品牌盛典”活动在香港亚洲电视台圆\r\n						满落幕。大奖，这是中国家族办公室行业里，唯一获得此项殊荣的企业。					</p><p><br/></p>',	'2130706433'),
(36,	'<p>请输入内容</p>',	'2130706433'),
(37,	'<p>请输入内容</p>',	'2130706433'),
(38,	'<p>请输入内容</p>',	'2130706433'),
(39,	'<p>请输入内容</p>',	'2130706433'),
(40,	'<p>请输入内容</p>',	'2130706433'),
(41,	'<p>请输入内容</p>',	'2130706433'),
(42,	'<p>请输入内容</p>',	'2130706433'),
(43,	'<p>请输入内容</p>',	'2130706433'),
(44,	'<p>请输入内容</p>',	'2130706433'),
(45,	NULL,	'2130706433'),
(46,	NULL,	'2130706433'),
(47,	NULL,	'2130706433'),
(48,	NULL,	'2130706433'),
(49,	NULL,	'2130706433'),
(50,	NULL,	'2130706433'),
(51,	NULL,	'2130706433'),
(52,	NULL,	'2130706433'),
(53,	'<h3><span style=\"font-size: 14px;\"></span></h3><p style=\"font-family: Simsun;font-size: medium;white-space: normal;line-height: 20px;background-color: rgb(255, 255, 255)\"><strong><span style=\"font-family: Arial; font-size: 14px;\">Address</span></strong><span style=\"font-family: Arial; font-size: 14px;\">：</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left; line-height: 20px; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial; font-size: 14px;\">5<sup>th</sup>&nbsp;Floor, West Tower,&nbsp;World Financial&nbsp;Center, No.1 East&nbsp;Third&nbsp;Ring&nbsp;MiddleRoad, Chaoyang District, &nbsp;100020,&nbsp;Beijing</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left; line-height: 20px; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial; font-size: 14px;\"><br/></span></p><h3 style=\"text-align: left;\"><strong><span style=\"font-size: 14px;\"><span style=\"font-family: Arial; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);\">Contact</span></span></strong><span style=\"font-size: 14px;\"><span style=\"font-family: Arial; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);\">：</span></span></h3><p style=\"text-align: left;\"><span style=\"font-size: 14px;\"><span style=\"line-height: 20px; text-align: justify; font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(128, 36, 40); font-family: Arial; font-size: 14px; line-height: 32px; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px; line-height: 20px; text-align: justify; font-family: Arial; background-color: rgb(255, 255, 255);\">Customer&nbsp;Direct&nbsp;Line:&nbsp;</span><span style=\"font-size: 14px;\">400-900-6668</span></span></span></span></p><p style=\"text-align: left;\"><span style=\"font-family: Arial; line-height: 20px; text-align: justify; font-size: 14px; background-color: rgb(255, 255, 255);\">Fax: +86 10 8587 8376</span></p><p style=\"text-align: left;\"><span style=\"font-family: Arial; line-height: 20px; text-align: justify; font-size: 14px; background-color: rgb(255, 255, 255);\"><br/></span></p><p style=\"text-align: left;\"><span style=\"font-size: 14px;\">Please fill in your personal information accurately to ensure a prompt response. <br/>All your registered information will be kept strictly confidential. <br/><br/></span></p>',	'2084677202'),
(54,	NULL,	'1877017295'),
(55,	NULL,	'1877017295'),
(56,	NULL,	'1877017295'),
(57,	NULL,	'1877017295'),
(58,	NULL,	'1877017295'),
(59,	NULL,	'1877017295'),
(60,	NULL,	'1877017295'),
(61,	NULL,	'1877017295'),
(62,	NULL,	'1877017295'),
(63,	NULL,	'1877017295'),
(64,	NULL,	'1877017295'),
(65,	NULL,	'1877017295'),
(66,	NULL,	'1877017295'),
(67,	NULL,	'1877017295'),
(68,	NULL,	'1877017295'),
(69,	NULL,	'1877017295'),
(70,	NULL,	'1877017295'),
(71,	NULL,	'1877017295'),
(72,	'<p style=\"text-align: left;\"><span style=\"font-size: 14px;\">We keep prominent families&#39; sustainability as the essential goal; &nbsp;provide strategic advice to family-owned enterprises; &nbsp;ensure cash flow is sufficient for managing enterprises&#39; market value; &nbsp;keep family wealth independent from family enterprises and related risk management and asset classes diversified.&nbsp;</span></p>',	'1875045704'),
(92,	NULL,	'3412349518'),
(93,	NULL,	'3412349518'),
(94,	NULL,	'3412349518'),
(96,	NULL,	'3412349518'),
(79,	NULL,	'465252696'),
(80,	NULL,	'465252696'),
(81,	NULL,	'465252696'),
(82,	NULL,	'465252696'),
(97,	NULL,	'1877017147'),
(98,	NULL,	'1877017147'),
(99,	NULL,	'1877017147'),
(100,	NULL,	'1877017147'),
(101,	NULL,	'1877017147'),
(95,	NULL,	'3412349518'),
(114,	NULL,	'2084677202'),
(115,	NULL,	'465233395'),
(83,	'<h3><span style=\"font-size: 14px;\"></span></h3><p style=\"font-family: Simsun;font-size: medium;white-space: normal;line-height: 20px;background-color: rgb(255, 255, 255)\"><strong><span style=\"font-family: Arial; font-size: 14px;\">Address</span></strong><span style=\"font-family: Arial; font-size: 14px;\">：</span></p><p style=\"font-family: Simsun; font-size: medium; white-space: normal; text-align: left; line-height: 20px; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial; font-size: 14px;\">5<sup>th</sup>&nbsp;Floor, West Tower,&nbsp;World Financial&nbsp;Center, No.1 East&nbsp;Third&nbsp;Ring&nbsp;MiddleRoad, Chaoyang District, &nbsp;100020,&nbsp;Beijing</span></p><p style=\"font-family: Simsun;font-size: medium;white-space: normal;text-align: justify;line-height: 20px;background-color: rgb(255, 255, 255)\"><span style=\"font-family: Arial; font-size: 14px;\"><br/></span></p><h3><strong><span style=\"font-size: 14px;\"><span style=\"font-family: Arial; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);\">Contact</span></span></strong><span style=\"font-size: 14px;\"><span style=\"font-family: Arial; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);\">：</span></span></h3><p><span style=\"font-size: 14px;\"><span style=\"font-family: Arial; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(128, 36, 40); font-family: Arial; font-size: 14px; text-align: justify; line-height: 20px; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px; font-family: Arial; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);\">Tel</span><span style=\"font-size: 14px;\"><span style=\"font-family: Arial; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);\">: &nbsp;+</span>86 10 8587 8900</span></span></span><br/><span style=\"line-height: 20px; text-align: justify; font-family: Arial; background-color: rgb(255, 255, 255);\"></span></span></p><p><span style=\"font-family: Arial; line-height: 20px; text-align: justify; font-size: 14px; background-color: rgb(255, 255, 255);\">Fax: +86 10 8587 8376</span></p><p><span style=\"font-family: Arial; line-height: 20px; text-align: justify; font-size: 14px; background-color: rgb(255, 255, 255);\"><br/></span></p><p><span style=\"font-size: 14px;\">Please fill in your personal information accurately to ensure a prompt response. <br/>All your registered information will be kept strictly confidential. <br/><br/></span></p>',	'2084677202'),
(84,	NULL,	'465294138'),
(85,	NULL,	'465294138'),
(86,	NULL,	'465294138'),
(87,	NULL,	'465294138'),
(88,	NULL,	'465294138'),
(89,	NULL,	'465294138'),
(90,	NULL,	'465294138'),
(91,	'<h3 style=\"white-space: normal;\">漢家族办公室是中国家族办公室行业的领航者，作为连接华人超高净值家族与全球资产配置顶级资源的桥梁，为华人超高净值家族量身定制“漢•家族传承管理系统”。</h3><p style=\"white-space: normal;\"><img src=\"/data/cms/upload_files/images/20160403/201604031459619055.jpg\" alt=\"\" width=\"556px\" style=\"white-space: normal;\"/></p><p style=\"white-space: normal;\">漢家族办公室产品与服务的标准是通过极致精密的“漢•家族传承管理系统”来实现。这套定制服务系统的关键价值在于漢家族采用全球最先进的金融工程学和绩 效工程学理论独家研发的集金融工程、绩效工程为一体的系统性模型。</p><p style=\"white-space: normal;\">漢家族基于全球金融数据库 分析下的精密计算与汇集全球传承智慧的科学测评，我们能精确的为客户定制专属方案，满足客户在家族传承中的各种需求，有效提升 了客户的家族绩效指标。</p><p style=\"white-space: normal;\"><img src=\"/data/cms/upload_files/images/20160403/201604031459619043.jpg\" alt=\"\" width=\"891px\"/></p><h4 style=\"white-space: normal;\">漢家族 - 全球资产配置顶级资源整合者——降低您在家族资产全球化进程中的投资风险</h4><p style=\"white-space: normal;\">漢家族办公室带领华人高净值家族与全球顶级财富管理者，全球最大对冲基金桥水公司创始人、古根汉姆家族现任掌门人、喜达屋集团创始人和董事长、百威啤酒 第四代掌门人等探讨全球经济一体化的家族传承，并为家族客户提供全球资产配置落地解决方案。</p><p><br/></p>',	'2084677202'),
(113,	'<div class=\"introduce_text container\" style=\"text-align: center;\"><h3 style=\"text-align: left;\"><span style=\"font-size: 16px;\">HMCFamily Office as a leader in the Chinese Family Office industry, the HMCFamily Office is a bridge connecting successful Chinese families with the world’s top asset allocation resources. Employingthe “HMCFamily Inheritance and Management System”, customized for those families with ultra high net worth, &nbsp;the HMCFO has set up a platform that offers a whole range of services geared to the global asset allocation, the protection of family assets, succession planning and the passing down of family tradition”.</span></h3><img src=\"/data/cms/upload_files/images/20160606/201606061465184966272.png\" alt=\"\"/><p style=\"text-align: left;\">HMCFO’s sophisticated “Inheritance and Management System” ensures a high standard for all its products and services. The key value of such a customized service system lies in its exclusive systematic model based on a combination of the world’s most advanced finance engineering and performance engineering theories.</p><p style=\"text-align: left;\">Accurate financial database calculation and scientific family inheritance assessment enable the HMCFamily Office to provide our clients with customized plans to meet their various needs in family inheritance and effectively improve their family performance.</p><p style=\"text-align: center;\"><img src=\"/data/cms/upload_files/images/20160606/201606061465202943224.png\" title=\"201606061465202943224.png\" alt=\"introduce02_副本.png\"/></p><h4 style=\"white-space: normal; text-align: left; line-height: 1.75em;\">HMCFamily Office：A Top Integrator of Global Asset Allocation Resources to Help Reduce Your Investment Risks in the Globalization of Your Family Assets</h4><p style=\"text-align: left;\">The HMCFO organized meetings between ultra high net worth Chinese families and the founder of Bridgewater, the world’s biggest hedge fund company; the current head of Guggenheim; the founder and president of Starwood Hotels; and the 4th-generation leader of Budweiser to discuss family inheritance in economic globalization, and provided the clients with asset allocation schemes.</p></div>',	'2084677202');

DROP TABLE IF EXISTS `omp_admin`;
CREATE TABLE `omp_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL COMMENT '组别ID',
  `username` varchar(32) NOT NULL COMMENT '账号',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `realname` varchar(50) NOT NULL COMMENT '真实姓名',
  `posts` varchar(50) DEFAULT NULL COMMENT '职位',
  `email` varchar(50) DEFAULT NULL COMMENT '电子邮箱',
  `qq` varchar(50) DEFAULT NULL COMMENT 'QQ信息',
  `phone` varchar(30) DEFAULT NULL COMMENT '电话',
  `mobile` varchar(30) DEFAULT NULL COMMENT '手机',
  `cardid` varchar(18) DEFAULT NULL COMMENT '身份证号',
  `birthday` varchar(10) DEFAULT NULL COMMENT '生日',
  `question` varchar(50) NOT NULL COMMENT '密码提示问题',
  `answer` varchar(50) NOT NULL COMMENT '密码提示问题答案',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `modify_time` int(11) unsigned NOT NULL COMMENT '修改时间',
  `login_count` int(11) unsigned NOT NULL COMMENT '登陆次数',
  `last_login_time` int(11) unsigned NOT NULL COMMENT '最后登陆时间',
  `last_login_ip` varchar(11) NOT NULL COMMENT '最后一次登陆IP',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态标识，0正常，1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_admin` (`id`, `role_id`, `username`, `password`, `realname`, `posts`, `email`, `qq`, `phone`, `mobile`, `cardid`, `birthday`, `question`, `answer`, `create_time`, `modify_time`, `login_count`, `last_login_time`, `last_login_ip`, `status`) VALUES
(2,	1,	'admin',	'edfe15a543acf3b09f8ce867c3bbb6f1',	'汉家',	'php',	'2504767240@qq.com',	'2504767240',	'15613231284',	'15613231284',	'',	'0709',	'你的工作是什么？',	'程序员',	2015,	1470120281,	182,	1482395613,	'124.65.166.',	0),
(3,	6,	'ceshi',	'cc17c30cd111c7215fc8f51f8790e0e1',	'测试',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1444983734,	0,	4,	1463118580,	'203.100.82.',	0);

DROP TABLE IF EXISTS `omp_admin_role`;
CREATE TABLE `omp_admin_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `description` varchar(255) DEFAULT NULL COMMENT '角色描述',
  `auth` varchar(10000) DEFAULT NULL COMMENT '权限集合',
  `sort` smallint(5) NOT NULL DEFAULT '10' COMMENT '排序',
  `is_check` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：0禁用，1正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_admin_role` (`id`, `name`, `description`, `auth`, `sort`, `is_check`) VALUES
(1,	'管理员',	'ceshi',	'all',	10,	1),
(6,	'编辑',	'编辑',	',299,287,286,285,274,273,379,378,371,370,369,368,350,349,348,347,338,364,363,270,269,268,267,266,',	10,	1);

DROP TABLE IF EXISTS `omp_attachment`;
CREATE TABLE `omp_attachment` (
  `aid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `filetype` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `fullpath` varchar(255) DEFAULT NULL,
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `fileext` varchar(50) DEFAULT NULL,
  `origname` varchar(50) DEFAULT NULL,
  `attachment` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL,
  `price` varchar(50) DEFAULT NULL COMMENT '报价',
  `price2` varchar(50) DEFAULT NULL,
  `is_price2` tinyint(2) DEFAULT '0' COMMENT '0 无 1 有外包报价',
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `omp_attachment` (`aid`, `uid`, `addtime`, `filename`, `filetype`, `filepath`, `fullpath`, `filesize`, `fileext`, `origname`, `attachment`, `description`, `price`, `price2`, `is_price2`) VALUES
(1,	0,	1444381981,	'/data/cms/upload_files/20151009/14443819818211.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151009/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151009/14443819818211.png',	205,	'.png',	'14443819818211.png',	'',	'index_banner.png',	NULL,	NULL,	0),
(2,	0,	1444731546,	'/data/cms/upload_files/20151013/14447315468308.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/14447315468308.png',	191,	'.png',	'14447315468308.png',	'',	'about_banner.png',	NULL,	NULL,	0),
(3,	0,	1444731791,	'/data/cms/upload_files/20151013/14447317919609.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/14447317919609.png',	106,	'.png',	'14447317919609.png',	'',	'about01.png',	NULL,	NULL,	0),
(4,	0,	1444731836,	'/data/cms/upload_files/20151013/14447318369835.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/14447318369835.png',	106,	'.png',	'14447318369835.png',	'',	'about01.png',	NULL,	NULL,	0),
(5,	0,	1444731871,	'/data/cms/upload_files/20151013/14447318716259.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/14447318716259.png',	81,	'.png',	'14447318716259.png',	'',	'about02.png',	NULL,	NULL,	0),
(6,	0,	1444731980,	'/data/cms/upload_files/20151013/14447319806301.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/14447319806301.png',	115,	'.png',	'14447319806301.png',	'',	'about04.png',	NULL,	NULL,	0),
(7,	0,	1444731999,	'/data/cms/upload_files/20151013/14447319995845.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/14447319995845.png',	81,	'.png',	'14447319995845.png',	'',	'about02.png',	NULL,	NULL,	0),
(8,	0,	1444732008,	'/data/cms/upload_files/20151013/14447320084999.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/14447320084999.png',	127,	'.png',	'14447320084999.png',	'',	'about03.png',	NULL,	NULL,	0),
(9,	0,	1444732031,	'/data/cms/upload_files/20151013/14447320315835.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/14447320315835.png',	112,	'.png',	'14447320315835.png',	'',	'about05.png',	NULL,	NULL,	0),
(10,	0,	1444732053,	'/data/cms/upload_files/20151013/14447320531148.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/14447320531148.jpg',	69,	'.jpg',	'14447320531148.jpg',	'',	'about06.jpg',	NULL,	NULL,	0),
(11,	0,	1444732453,	'/data/cms/upload_files/20151013/14447324537490.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151013/14447324537490.png',	106,	'.png',	'14447324537490.png',	'',	'about01.png',	NULL,	NULL,	0),
(12,	0,	1444787671,	'/data/cms/upload_files/20151014/14447876713054.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/14447876713054.jpg',	192,	'.jpg',	'14447876713054.jpg',	'',	'wealth_banner.jpg',	NULL,	NULL,	0),
(13,	0,	1444813922,	'/data/cms/upload_files/20151014/14448139227864.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/14448139227864.jpg',	183,	'.jpg',	'14448139227864.jpg',	'',	'charity_banner.jpg',	NULL,	NULL,	0),
(14,	0,	1444814133,	'/data/cms/upload_files/20151014/14448141333123.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/14448141333123.jpg',	102,	'.jpg',	'14448141333123.jpg',	'',	'cishan_banner.jpg',	NULL,	NULL,	0),
(15,	0,	1444818488,	'/data/cms/upload_files/20151014/14448184889291.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/14448184889291.jpg',	120,	'.jpg',	'14448184889291.jpg',	'',	'jijin-img.jpg',	NULL,	NULL,	0),
(16,	0,	1444818537,	'/data/cms/upload_files/20151014/14448185378492.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/14448185378492.png',	5,	'.png',	'14448185378492.png',	'',	'jijin_ico01.png',	NULL,	NULL,	0),
(17,	0,	1444818557,	'/data/cms/upload_files/20151014/14448185573328.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151014/14448185573328.png',	12,	'.png',	'14448185573328.png',	'',	'jijin_logo02.png',	NULL,	NULL,	0),
(18,	0,	1444872838,	'/data/cms/upload_files/20151015/14448728385170.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/14448728385170.png',	6,	'.png',	'14448728385170.png',	'',	'jijin02_ico.png',	NULL,	NULL,	0),
(19,	0,	1444872850,	'/data/cms/upload_files/20151015/14448728508743.png',	'image/png',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/14448728508743.png',	8,	'.png',	'14448728508743.png',	'',	'jijin_logo01.png',	NULL,	NULL,	0),
(20,	0,	1444892239,	'/data/cms/upload_files/20151015/14448922393152.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/14448922393152.jpg',	88,	'.jpg',	'14448922393152.jpg',	'',	'charity_banner.jpg',	NULL,	NULL,	0),
(21,	0,	1444892742,	'/data/cms/upload_files/20151015/14448927424234.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/14448927424234.jpg',	13,	'.jpg',	'14448927424234.jpg',	'',	'institute01.jpg',	NULL,	NULL,	0),
(22,	0,	1444892806,	'/data/cms/upload_files/20151015/14448928054131.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/14448928054131.jpg',	30,	'.jpg',	'14448928054131.jpg',	'',	'institute02.jpg',	NULL,	NULL,	0),
(23,	0,	1444892876,	'/data/cms/upload_files/20151015/14448928764490.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/14448928764490.jpg',	25,	'.jpg',	'14448928764490.jpg',	'',	'institute03.jpg',	NULL,	NULL,	0),
(24,	0,	1444900076,	'/data/cms/upload_files/20151015/14449000765438.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151015/14449000765438.jpg',	150,	'.jpg',	'14449000765438.jpg',	'',	'learn_banner.jpg',	NULL,	NULL,	0),
(25,	0,	1449558284,	'/data/cms/upload_files/20151208/14495582846963.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/14495582846963.jpg',	10,	'.jpg',	'14495582846963.jpg',	'',	'event_img01.jpg',	NULL,	NULL,	0),
(26,	0,	1449558294,	'/data/cms/upload_files/20151208/14495582949663.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/14495582949663.jpg',	4,	'.jpg',	'14495582949663.jpg',	'',	'._event_img02_.jpg',	NULL,	NULL,	0),
(27,	0,	1449558317,	'/data/cms/upload_files/20151208/14495583172843.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/14495583172843.jpg',	8,	'.jpg',	'14495583172843.jpg',	'',	'event_img02.jpg',	NULL,	NULL,	0),
(28,	0,	1449558324,	'/data/cms/upload_files/20151208/14495583242943.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/14495583242943.jpg',	10,	'.jpg',	'14495583242943.jpg',	'',	'event_img03.jpg',	NULL,	NULL,	0),
(29,	0,	1449558406,	'/data/cms/upload_files/20151208/14495584064357.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/14495584064357.jpg',	8,	'.jpg',	'14495584064357.jpg',	'',	'event_img10.jpg',	NULL,	NULL,	0),
(30,	0,	1449558458,	'/data/cms/upload_files/20151208/14495584583448.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/14495584583448.jpg',	11,	'.jpg',	'14495584583448.jpg',	'',	'event_img04.jpg',	NULL,	NULL,	0),
(31,	0,	1449558466,	'/data/cms/upload_files/20151208/14495584666488.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/14495584666488.jpg',	10,	'.jpg',	'14495584666488.jpg',	'',	'event_img05.jpg',	NULL,	NULL,	0),
(32,	0,	1449558474,	'/data/cms/upload_files/20151208/14495584746416.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/14495584746416.jpg',	11,	'.jpg',	'14495584746416.jpg',	'',	'event_img06.jpg',	NULL,	NULL,	0),
(33,	0,	1449558529,	'/data/cms/upload_files/20151208/14495585292770.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/14495585292770.jpg',	7,	'.jpg',	'14495585292770.jpg',	'',	'event_img07.jpg',	NULL,	NULL,	0),
(34,	0,	1449558534,	'/data/cms/upload_files/20151208/14495585345164.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/14495585345164.jpg',	7,	'.jpg',	'14495585345164.jpg',	'',	'event_img08.jpg',	NULL,	NULL,	0),
(35,	0,	1449558541,	'/data/cms/upload_files/20151208/14495585414429.jpg',	'image/jpeg',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/',	'D:/wamp/wamp/www/hanjia/data/cms/upload_files/20151208/14495585414429.jpg',	9,	'.jpg',	'14495585414429.jpg',	'',	'event_img09.jpg',	NULL,	NULL,	0),
(36,	0,	1451275227,	'/data/cms/upload_files/20151228/14512752279694.jpg',	'image/jpeg',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/14512752279694.jpg',	74,	'.jpg',	'14512752279694.jpg',	'',	'about05.jpg',	NULL,	NULL,	0),
(37,	0,	1451275245,	'/data/cms/upload_files/20151228/14512752458239.jpg',	'image/jpeg',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/14512752458239.jpg',	75,	'.jpg',	'14512752458239.jpg',	'',	'about04.jpg',	NULL,	NULL,	0),
(38,	0,	1451275259,	'/data/cms/upload_files/20151228/14512752598061.jpg',	'image/jpeg',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/14512752598061.jpg',	89,	'.jpg',	'14512752598061.jpg',	'',	'about03.jpg',	NULL,	NULL,	0),
(39,	0,	1451275276,	'/data/cms/upload_files/20151228/14512752768358.jpg',	'image/jpeg',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/14512752768358.jpg',	83,	'.jpg',	'14512752768358.jpg',	'',	'about02.jpg',	NULL,	NULL,	0),
(40,	0,	1451275292,	'/data/cms/upload_files/20151228/14512752926456.jpg',	'image/jpeg',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/14512752926456.jpg',	72,	'.jpg',	'14512752926456.jpg',	'',	'about01.jpg',	NULL,	NULL,	0),
(41,	0,	1451275306,	'/data/cms/upload_files/20151228/14512753061591.jpg',	'image/jpeg',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/14512753061591.jpg',	72,	'.jpg',	'14512753061591.jpg',	'',	'about01.jpg',	NULL,	NULL,	0),
(42,	0,	1451275324,	'/data/cms/upload_files/20151228/14512753245028.jpg',	'image/jpeg',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/',	'/data/www/default/2015/hanjia/data/cms/upload_files/20151228/14512753245028.jpg',	63,	'.jpg',	'14512753245028.jpg',	'',	'about06.jpg',	NULL,	NULL,	0),
(43,	0,	1451393771,	'/data/cms/upload_files/20151229/14513937713459.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151229/',	'/var/www/hanjiazu/data/cms/upload_files/20151229/14513937713459.jpg',	111,	'.jpg',	'14513937713459.jpg',	'',	'index_banner.jpg',	NULL,	NULL,	0),
(44,	0,	1451395434,	'/data/cms/upload_files/20151229/14513954349476.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151229/',	'/var/www/hanjiazu/data/cms/upload_files/20151229/14513954349476.jpg',	185,	'.jpg',	'14513954349476.jpg',	'',	'about_banner.jpg',	NULL,	NULL,	0),
(45,	0,	1451395726,	'/data/cms/upload_files/20151229/14513957264683.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151229/',	'/var/www/hanjiazu/data/cms/upload_files/20151229/14513957264683.jpg',	191,	'.jpg',	'14513957264683.jpg',	'',	'wealth_banner.jpg',	NULL,	NULL,	0),
(46,	0,	1451470605,	'/data/cms/upload_files/20151230/14514706055399.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514706055399.jpg',	185,	'.jpg',	'14514706055399.jpg',	'',	'about_banner.jpg',	NULL,	NULL,	0),
(47,	0,	1451470622,	'/data/cms/upload_files/20151230/14514706222242.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514706222242.jpg',	185,	'.jpg',	'14514706222242.jpg',	'',	'about_banner.jpg',	NULL,	NULL,	0),
(48,	0,	1451470639,	'/data/cms/upload_files/20151230/14514706399241.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514706399241.jpg',	185,	'.jpg',	'14514706399241.jpg',	'',	'about_banner.jpg',	NULL,	NULL,	0),
(49,	0,	1451470654,	'/data/cms/upload_files/20151230/14514706549100.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514706549100.jpg',	185,	'.jpg',	'14514706549100.jpg',	'',	'about_banner.jpg',	NULL,	NULL,	0),
(50,	0,	1451470671,	'/data/cms/upload_files/20151230/14514706717199.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514706717199.jpg',	185,	'.jpg',	'14514706717199.jpg',	'',	'about_banner.jpg',	NULL,	NULL,	0),
(51,	0,	1451472903,	'/data/cms/upload_files/20151230/14514729031041.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514729031041.png',	7,	'.png',	'14514729031041.png',	'',	'jijin_ico01.png',	NULL,	NULL,	0),
(52,	0,	1451473032,	'/data/cms/upload_files/20151230/14514730323951.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514730323951.png',	51,	'.png',	'14514730323951.png',	'',	'HPDSL3T_0IP9JA`H~R}V11G.png',	NULL,	NULL,	0),
(53,	0,	1451473102,	'/data/cms/upload_files/20151230/14514731027559.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514731027559.png',	49,	'.png',	'14514731027559.png',	'',	'5AJM01ZBSXTKE$I31A5K$2Y.png',	NULL,	NULL,	0),
(54,	0,	1451473177,	'/data/cms/upload_files/20151230/14514731773895.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514731773895.png',	13,	'.png',	'14514731773895.png',	'',	'E](CF1S80@`A_[MSM0QD{66.png',	NULL,	NULL,	0),
(55,	0,	1451473238,	'/data/cms/upload_files/20151230/14514732387484.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514732387484.png',	39,	'.png',	'14514732387484.png',	'',	'$CH)RNFB902U6%YA]1Y~[{0.png',	NULL,	NULL,	0),
(56,	0,	1451473248,	'/data/cms/upload_files/20151230/14514732486738.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514732486738.png',	42,	'.png',	'14514732486738.png',	'',	'I{XBSKJ6[{Y{AC(V}4_ZVK3.png',	NULL,	NULL,	0),
(57,	0,	1451473341,	'/data/cms/upload_files/20151230/14514733413261.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514733413261.png',	32,	'.png',	'14514733413261.png',	'',	'}9FM2FIZAEL~JH_3)SU8B[J.png',	NULL,	NULL,	0),
(58,	0,	1451473350,	'/data/cms/upload_files/20151230/14514733507277.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514733507277.png',	33,	'.png',	'14514733507277.png',	'',	'{4TCISIK8B2D2W(N2$V@KJB.png',	NULL,	NULL,	0),
(59,	0,	1451473359,	'/data/cms/upload_files/20151230/14514733596116.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514733596116.png',	36,	'.png',	'14514733596116.png',	'',	'MTF6K@6RQI(_8Z4Z2V`%4XO.png',	NULL,	NULL,	0),
(60,	0,	1451473421,	'/data/cms/upload_files/20151230/14514734217868.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514734217868.png',	34,	'.png',	'14514734217868.png',	'',	'M(046${A]8]C]GU3]T9M)EH.png',	NULL,	NULL,	0),
(61,	0,	1451473430,	'/data/cms/upload_files/20151230/14514734302283.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514734302283.png',	23,	'.png',	'14514734302283.png',	'',	'%4C(9W)G9HC2V{HF1A2BI4D.png',	NULL,	NULL,	0),
(62,	0,	1451473487,	'/data/cms/upload_files/20151230/14514734876463.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514734876463.png',	39,	'.png',	'14514734876463.png',	'',	'6TI[YQ9KJ$3)JSW{M`77V{L.png',	NULL,	NULL,	0),
(63,	0,	1451473557,	'/data/cms/upload_files/20151230/14514735577750.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514735577750.png',	37,	'.png',	'14514735577750.png',	'',	'4FD(OJSR[6S@MS3TLD3J7ON.png',	NULL,	NULL,	0),
(64,	0,	1451473566,	'/data/cms/upload_files/20151230/14514735664139.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514735664139.png',	26,	'.png',	'14514735664139.png',	'',	'65}}MBSQ(567401EO23)6RJ.png',	NULL,	NULL,	0),
(65,	0,	1451473653,	'/data/cms/upload_files/20151230/14514736537351.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514736537351.png',	21,	'.png',	'14514736537351.png',	'',	'I[7I80MK(WCHF_DULO%V5QU.png',	NULL,	NULL,	0),
(66,	0,	1451473661,	'/data/cms/upload_files/20151230/14514736615463.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514736615463.png',	16,	'.png',	'14514736615463.png',	'',	'@$41~PDY3Q`2UI]JXVF1QKL.png',	NULL,	NULL,	0),
(67,	0,	1451473760,	'/data/cms/upload_files/20151230/14514737609232.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514737609232.png',	26,	'.png',	'14514737609232.png',	'',	'VMR7EXGL){JFB5%GUO~C9S0.png',	NULL,	NULL,	0),
(68,	0,	1451473770,	'/data/cms/upload_files/20151230/14514737709547.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514737709547.png',	25,	'.png',	'14514737709547.png',	'',	'5VX3X[CP9QJ3H@_T9DX$08P.png',	NULL,	NULL,	0),
(69,	0,	1451473779,	'/data/cms/upload_files/20151230/14514737795968.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514737795968.png',	25,	'.png',	'14514737795968.png',	'',	'S3GQI@46UZ82JKIB@_X{_~9.png',	NULL,	NULL,	0),
(70,	0,	1451473787,	'/data/cms/upload_files/20151230/14514737872361.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514737872361.png',	34,	'.png',	'14514737872361.png',	'',	'LO9S%8(8W4EH7`OA$`76I8L.png',	NULL,	NULL,	0),
(71,	0,	1451479162,	'/data/cms/upload_files/20151230/14514791622773.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514791622773.png',	1,	'.png',	'14514791622773.png',	'',	'jijin02_ico.png',	NULL,	NULL,	0),
(72,	0,	1451479191,	'/data/cms/upload_files/20151230/14514791913412.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514791913412.png',	7,	'.png',	'14514791913412.png',	'',	'jijin_ico01.png',	NULL,	NULL,	0),
(73,	0,	1451479233,	'/data/cms/upload_files/20151230/14514792338764.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514792338764.png',	6,	'.png',	'14514792338764.png',	'',	'jijin02_ico.png',	NULL,	NULL,	0),
(74,	0,	1451481495,	'/data/cms/upload_files/20151230/14514814954165.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514814954165.png',	5,	'.png',	'14514814954165.png',	'',	'jijin_ico01.png',	NULL,	NULL,	0),
(75,	0,	1451485632,	'/data/cms/upload_files/20151230/14514856325357.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514856325357.png',	29,	'.png',	'14514856325357.png',	'',	'TO5@LFF@_V~`CG{O066LOT2.png',	NULL,	NULL,	0),
(76,	0,	1451485644,	'/data/cms/upload_files/20151230/14514856445946.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514856445946.png',	59,	'.png',	'14514856445946.png',	'',	'3PP%[_IAP`[(XT3)ZNEEV9V.png',	NULL,	NULL,	0),
(77,	0,	1451485721,	'/data/cms/upload_files/20151230/14514857211570.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514857211570.png',	56,	'.png',	'14514857211570.png',	'',	'DJ]NTCVFH0{SZ`D{BO_9(U4.png',	NULL,	NULL,	0),
(78,	0,	1451485824,	'/data/cms/upload_files/20151230/14514858246093.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514858246093.png',	28,	'.png',	'14514858246093.png',	'',	'UQ4L~76`_$8B)1K4AJ6T1%5.png',	NULL,	NULL,	0),
(79,	0,	1451485829,	'/data/cms/upload_files/20151230/14514858291753.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514858291753.png',	14,	'.png',	'14514858291753.png',	'',	'3JK97MB3@HP8G5IS]88(SLB.png',	NULL,	NULL,	0),
(80,	0,	1451485982,	'/data/cms/upload_files/20151230/14514859829465.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514859829465.png',	31,	'.png',	'14514859829465.png',	'',	'{PWNGEB9@}BM{NH46VW[O1C.png',	NULL,	NULL,	0),
(81,	0,	1451485993,	'/data/cms/upload_files/20151230/14514859938878.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151230/',	'/var/www/hanjiazu/data/cms/upload_files/20151230/14514859938878.png',	31,	'.png',	'14514859938878.png',	'',	'][W7J%ZV%N~L46OB_M6EONL.png',	NULL,	NULL,	0),
(82,	0,	1451543113,	'/data/cms/upload_files/20151231/14515431131078.png',	'image/png',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515431131078.png',	49,	'.png',	'14515431131078.png',	'',	'5AJM01ZBSXTKE$I31A5K$2Y.png',	NULL,	NULL,	0),
(83,	0,	1451548239,	'/data/cms/upload_files/20151231/14515482394098.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515482394098.jpg',	186,	'.jpg',	'14515482394098.jpg',	'',	'1.jpg',	NULL,	NULL,	0),
(84,	0,	1451548247,	'/data/cms/upload_files/20151231/14515482476617.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515482476617.jpg',	273,	'.jpg',	'14515482476617.jpg',	'',	'2.jpg',	NULL,	NULL,	0),
(85,	0,	1451548254,	'/data/cms/upload_files/20151231/14515482545998.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515482545998.jpg',	190,	'.jpg',	'14515482545998.jpg',	'',	'3.jpg',	NULL,	NULL,	0),
(86,	0,	1451548261,	'/data/cms/upload_files/20151231/14515482611471.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515482611471.jpg',	263,	'.jpg',	'14515482611471.jpg',	'',	'4.jpg',	NULL,	NULL,	0),
(87,	0,	1451548854,	'/data/cms/upload_files/20151231/14515488542787.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515488542787.jpg',	26,	'.jpg',	'14515488542787.jpg',	'',	'111.jpg',	NULL,	NULL,	0),
(88,	0,	1451548875,	'/data/cms/upload_files/20151231/14515488753126.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515488753126.jpg',	26,	'.jpg',	'14515488753126.jpg',	'',	'111.jpg',	NULL,	NULL,	0),
(89,	0,	1451548901,	'/data/cms/upload_files/20151231/14515489011810.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515489011810.jpg',	26,	'.jpg',	'14515489011810.jpg',	'',	'111.jpg',	NULL,	NULL,	0),
(90,	0,	1451550342,	'/data/cms/upload_files/20151231/14515503426230.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515503426230.jpg',	162,	'.jpg',	'14515503426230.jpg',	'',	'1-1.jpg',	NULL,	NULL,	0),
(91,	0,	1451550369,	'/data/cms/upload_files/20151231/14515503698244.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515503698244.jpg',	219,	'.jpg',	'14515503698244.jpg',	'',	'2-1.jpg',	NULL,	NULL,	0),
(92,	0,	1451554924,	'/data/cms/upload_files/20151231/14515549245058.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515549245058.jpg',	172,	'.jpg',	'14515549245058.jpg',	'',	'家族learn生活.jpg',	NULL,	NULL,	0),
(93,	0,	1451555656,	'/data/cms/upload_files/20151231/14515556568917.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515556568917.jpg',	136,	'.jpg',	'14515556568917.jpg',	'',	'首页.jpg',	NULL,	NULL,	0),
(94,	0,	1451555705,	'/data/cms/upload_files/20151231/14515557052821.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515557052821.jpg',	273,	'.jpg',	'14515557052821.jpg',	'',	'汉家族家族.jpg',	NULL,	NULL,	0),
(95,	0,	1451555719,	'/data/cms/upload_files/20151231/14515557194692.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515557194692.jpg',	197,	'.jpg',	'14515557194692.jpg',	'',	'家族关心.jpg',	NULL,	NULL,	0),
(96,	0,	1451555728,	'/data/cms/upload_files/20151231/14515557285814.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515557285814.jpg',	214,	'.jpg',	'14515557285814.jpg',	'',	'家族给予.jpg',	NULL,	NULL,	0),
(97,	0,	1451555736,	'/data/cms/upload_files/20151231/14515557364755.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515557364755.jpg',	202,	'.jpg',	'14515557364755.jpg',	'',	'家族连接.jpg',	NULL,	NULL,	0),
(98,	0,	1451555745,	'/data/cms/upload_files/20151231/14515557454381.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515557454381.jpg',	136,	'.jpg',	'14515557454381.jpg',	'',	'家族专注.jpg',	NULL,	NULL,	0),
(99,	0,	1451555814,	'/data/cms/upload_files/20151231/14515558147894.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515558147894.jpg',	221,	'.jpg',	'14515558147894.jpg',	'',	'家族财富保障.jpg',	NULL,	NULL,	0),
(100,	0,	1451555829,	'/data/cms/upload_files/20151231/14515558298795.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515558298795.jpg',	190,	'.jpg',	'14515558298795.jpg',	'',	'家族慈善.jpg',	NULL,	NULL,	0),
(101,	0,	1451555842,	'/data/cms/upload_files/20151231/14515558422370.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20151231/',	'/var/www/hanjiazu/data/cms/upload_files/20151231/14515558422370.jpg',	173,	'.jpg',	'14515558422370.jpg',	'',	'家族研究院.jpg',	NULL,	NULL,	0),
(102,	0,	1452671806,	'/data/cms/upload_files/20160113/14526718068361.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20160113/',	'/var/www/hanjiazu/data/cms/upload_files/20160113/14526718068361.jpg',	114,	'.jpg',	'14526718068361.jpg',	'',	'1.jpg',	NULL,	NULL,	0),
(103,	0,	1452674382,	'/data/cms/upload_files/20160113/14526743828323.jpg',	'image/jpeg',	'/var/www/hanjiazu/data/cms/upload_files/20160113/',	'/var/www/hanjiazu/data/cms/upload_files/20160113/14526743828323.jpg',	112,	'.jpg',	'14526743828323.jpg',	'',	'11.jpg',	NULL,	NULL,	0),
(104,	0,	1453434602,	'/data/cms/upload_files/20160122/14534346027818.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534346027818.jpg',	72,	'.jpg',	'14534346027818.jpg',	'',	'about01.jpg',	NULL,	NULL,	0),
(105,	0,	1453434636,	'/data/cms/upload_files/20160122/14534346364879.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534346364879.jpg',	83,	'.jpg',	'14534346364879.jpg',	'',	'about02.jpg',	NULL,	NULL,	0),
(106,	0,	1453434653,	'/data/cms/upload_files/20160122/14534346527632.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534346527632.jpg',	89,	'.jpg',	'14534346527632.jpg',	'',	'about03.jpg',	NULL,	NULL,	0),
(107,	0,	1453434669,	'/data/cms/upload_files/20160122/14534346693728.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534346693728.jpg',	75,	'.jpg',	'14534346693728.jpg',	'',	'about04.jpg',	NULL,	NULL,	0),
(108,	0,	1453434687,	'/data/cms/upload_files/20160122/14534346876559.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534346876559.jpg',	74,	'.jpg',	'14534346876559.jpg',	'',	'about05.jpg',	NULL,	NULL,	0),
(109,	0,	1453434706,	'/data/cms/upload_files/20160122/14534347062225.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534347062225.jpg',	63,	'.jpg',	'14534347062225.jpg',	'',	'about06.jpg',	NULL,	NULL,	0),
(110,	0,	1453435552,	'/data/cms/upload_files/20160122/14534355527748.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534355527748.jpg',	107,	'.jpg',	'14534355527748.jpg',	'',	'about05.jpg',	NULL,	NULL,	0),
(111,	0,	1453435592,	'/data/cms/upload_files/20160122/14534355923820.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534355923820.jpg',	188,	'.jpg',	'14534355923820.jpg',	'',	'about03.jpg',	NULL,	NULL,	0),
(112,	0,	1453435608,	'/data/cms/upload_files/20160122/14534356087710.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534356087710.jpg',	95,	'.jpg',	'14534356087710.jpg',	'',	'about02.jpg',	NULL,	NULL,	0),
(113,	0,	1453435622,	'/data/cms/upload_files/20160122/14534356222291.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534356222291.jpg',	107,	'.jpg',	'14534356222291.jpg',	'',	'about05.jpg',	NULL,	NULL,	0),
(114,	0,	1453435649,	'/data/cms/upload_files/20160122/14534356493438.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534356493438.jpg',	188,	'.jpg',	'14534356493438.jpg',	'',	'about-banner01.jpg',	NULL,	NULL,	0),
(115,	0,	1453435732,	'/data/cms/upload_files/20160122/14534357323937.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534357323937.jpg',	146,	'.jpg',	'14534357323937.jpg',	'',	'首页_02.jpg',	NULL,	NULL,	0),
(116,	0,	1453436388,	'/data/cms/upload_files/20160122/14534363887576.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534363887576.jpg',	198,	'.jpg',	'14534363887576.jpg',	'',	'家族财富保障_02.jpg',	NULL,	NULL,	0),
(117,	0,	1453436466,	'/data/cms/upload_files/20160122/14534364664974.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160122/14534364664974.jpg',	166,	'.jpg',	'14534364664974.jpg',	'',	'家族learn生活_02.jpg',	NULL,	NULL,	0),
(118,	0,	1453710099,	'/data/cms/upload_files/20160125/14537100995375.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160125/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160125/14537100995375.png',	6,	'.png',	'14537100995375.png',	'',	'14514792338764.png',	NULL,	NULL,	0),
(119,	0,	1453710119,	'/data/cms/upload_files/20160125/14537101192847.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160125/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160125/14537101192847.png',	5,	'.png',	'14537101192847.png',	'',	'14514814954165.png',	NULL,	NULL,	0),
(120,	0,	1458620841,	'/data/cms/upload_files/20160322/14586208417818.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160322/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160322/14586208417818.jpg',	121,	'.jpg',	'14586208417818.jpg',	'',	'14564517229991.jpg',	NULL,	NULL,	0),
(121,	0,	1458620879,	'/data/cms/upload_files/20160322/14586208796043.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160322/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160322/14586208796043.jpg',	173,	'.jpg',	'14586208796043.jpg',	'',	'14515558422370.jpg',	NULL,	NULL,	0),
(122,	0,	1459618726,	'/data/cms/upload_files/20160403/14596187254386.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/14596187254386.jpg',	222,	'.jpg',	'14596187254386.jpg',	'',	'14561203245299.jpg',	NULL,	NULL,	0),
(123,	0,	1459618748,	'/data/cms/upload_files/20160403/14596187482758.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/14596187482758.jpg',	257,	'.jpg',	'14596187482758.jpg',	'',	'14561203372759.jpg',	NULL,	NULL,	0),
(124,	0,	1459618772,	'/data/cms/upload_files/20160403/14596187729971.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/14596187729971.jpg',	70,	'.jpg',	'14596187729971.jpg',	'',	'14561203573173.jpg',	NULL,	NULL,	0),
(125,	0,	1459618794,	'/data/cms/upload_files/20160403/14596187948250.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/14596187948250.jpg',	128,	'.jpg',	'14596187948250.jpg',	'',	'14561203745566.jpg',	NULL,	NULL,	0),
(126,	0,	1459618841,	'/data/cms/upload_files/20160403/14596188416634.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/14596188416634.jpg',	25,	'.jpg',	'14596188416634.jpg',	'',	'jadeite03.jpg',	NULL,	NULL,	0),
(127,	0,	1459618844,	'/data/cms/upload_files/20160403/14596188448898.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/14596188448898.jpg',	32,	'.jpg',	'14596188448898.jpg',	'',	'jadeite04.jpg',	NULL,	NULL,	0),
(128,	0,	1459618875,	'/data/cms/upload_files/20160403/14596188758538.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/14596188758538.jpg',	30,	'.jpg',	'14596188758538.jpg',	'',	'jadeite01.jpg',	NULL,	NULL,	0),
(129,	0,	1459618878,	'/data/cms/upload_files/20160403/14596188782868.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/14596188782868.jpg',	28,	'.jpg',	'14596188782868.jpg',	'',	'jadeite02.jpg',	NULL,	NULL,	0),
(130,	0,	1459618931,	'/data/cms/upload_files/20160403/14596189318097.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/14596189318097.jpg',	85,	'.jpg',	'14596189318097.jpg',	'',	'14580357132748.jpg',	NULL,	NULL,	0),
(131,	0,	1459618933,	'/data/cms/upload_files/20160403/14596189336404.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160403/14596189336404.jpg',	16,	'.jpg',	'14596189336404.jpg',	'',	'14580357161314.jpg',	NULL,	NULL,	0),
(132,	0,	1463448973,	'/data/cms/upload_files/20160517/14634489728268.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/14634489728268.jpg',	103,	'.jpg',	'14634489728268.jpg',	'',	'14601006732370.jpg',	NULL,	NULL,	0),
(133,	0,	1463448976,	'/data/cms/upload_files/20160517/14634489769994.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/14634489769994.jpg',	16,	'.jpg',	'14634489769994.jpg',	'',	'14601006776338.jpg',	NULL,	NULL,	0),
(134,	0,	1463449016,	'/data/cms/upload_files/20160517/14634490167285.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/14634490167285.jpg',	153,	'.jpg',	'14634490167285.jpg',	'',	'14601006275797.jpg',	NULL,	NULL,	0),
(135,	0,	1463449019,	'/data/cms/upload_files/20160517/14634490198566.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/14634490198566.jpg',	32,	'.jpg',	'14634490198566.jpg',	'',	'14601006332193.jpg',	NULL,	NULL,	0),
(136,	0,	1463449045,	'/data/cms/upload_files/20160517/14634490452340.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/14634490452340.jpg',	97,	'.jpg',	'14634490452340.jpg',	'',	'14601005807822.jpg',	NULL,	NULL,	0),
(137,	0,	1463449048,	'/data/cms/upload_files/20160517/14634490488725.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160517/14634490488725.jpg',	35,	'.jpg',	'14634490488725.jpg',	'',	'14601005871979.jpg',	NULL,	NULL,	0),
(138,	0,	1464079522,	'/data/cms/upload_files/20160524/14640795225789.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160524/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160524/14640795225789.jpg',	146,	'.jpg',	'14640795225789.jpg',	'',	'14534357323937.jpg',	NULL,	NULL,	0),
(139,	0,	1464171954,	'/data/cms/upload_files/20160525/14641719549468.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641719549468.png',	51,	'.png',	'14641719549468.png',	'',	'14514730323951.png',	NULL,	NULL,	0),
(140,	0,	1464171961,	'/data/cms/upload_files/20160525/14641719619803.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641719619803.png',	49,	'.png',	'14641719619803.png',	'',	'14515431131078.png',	NULL,	NULL,	0),
(141,	0,	1464172054,	'/data/cms/upload_files/20160525/14641720543262.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641720543262.png',	13,	'.png',	'14641720543262.png',	'',	'14514731773895.png',	NULL,	NULL,	0),
(142,	0,	1464172098,	'/data/cms/upload_files/20160525/14641720984170.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641720984170.png',	39,	'.png',	'14641720984170.png',	'',	'14514732387484.png',	NULL,	NULL,	0),
(143,	0,	1464172108,	'/data/cms/upload_files/20160525/14641721083060.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641721083060.png',	42,	'.png',	'14641721083060.png',	'',	'14514732486738.png',	NULL,	NULL,	0),
(144,	0,	1464172142,	'/data/cms/upload_files/20160525/14641721427994.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641721427994.png',	32,	'.png',	'14641721427994.png',	'',	'14514733413261.png',	NULL,	NULL,	0),
(145,	0,	1464172150,	'/data/cms/upload_files/20160525/14641721509841.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641721509841.png',	33,	'.png',	'14641721509841.png',	'',	'14514733507277.png',	NULL,	NULL,	0),
(146,	0,	1464172182,	'/data/cms/upload_files/20160525/14641721826538.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641721826538.png',	34,	'.png',	'14641721826538.png',	'',	'14514734217868.png',	NULL,	NULL,	0),
(147,	0,	1464172189,	'/data/cms/upload_files/20160525/14641721896417.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641721896417.png',	23,	'.png',	'14641721896417.png',	'',	'14514734302283.png',	NULL,	NULL,	0),
(148,	0,	1464172221,	'/data/cms/upload_files/20160525/14641722219611.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641722219611.png',	39,	'.png',	'14641722219611.png',	'',	'14514734876463.png',	NULL,	NULL,	0),
(149,	0,	1464172274,	'/data/cms/upload_files/20160525/14641722747012.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641722747012.png',	37,	'.png',	'14641722747012.png',	'',	'14514735577750.png',	NULL,	NULL,	0),
(150,	0,	1464172280,	'/data/cms/upload_files/20160525/14641722806867.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641722806867.png',	26,	'.png',	'14641722806867.png',	'',	'14514735664139.png',	NULL,	NULL,	0),
(151,	0,	1464172321,	'/data/cms/upload_files/20160525/14641723216337.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641723216337.png',	16,	'.png',	'14641723216337.png',	'',	'14514736615463.png',	NULL,	NULL,	0),
(152,	0,	1464172346,	'/data/cms/upload_files/20160525/14641723467995.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641723467995.png',	25,	'.png',	'14641723467995.png',	'',	'14514737709547.png',	NULL,	NULL,	0),
(153,	0,	1464172363,	'/data/cms/upload_files/20160525/14641723632387.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641723632387.png',	25,	'.png',	'14641723632387.png',	'',	'14514737795968.png',	NULL,	NULL,	0),
(154,	0,	1464172409,	'/data/cms/upload_files/20160525/14641724095890.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641724095890.png',	59,	'.png',	'14641724095890.png',	'',	'14514856445946.png',	NULL,	NULL,	0),
(155,	0,	1464172467,	'/data/cms/upload_files/20160525/14641724674672.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641724674672.png',	56,	'.png',	'14641724674672.png',	'',	'14514857211570.png',	NULL,	NULL,	0),
(156,	0,	1464172486,	'/data/cms/upload_files/20160525/14641724865716.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160525/14641724865716.png',	28,	'.png',	'14641724865716.png',	'',	'14514858246093.png',	NULL,	NULL,	0),
(157,	0,	1464229513,	'/data/cms/upload_files/20160526/14642295134630.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/14642295134630.png',	31,	'.png',	'14642295134630.png',	'',	'14514859829465.png',	NULL,	NULL,	0),
(158,	0,	1464229520,	'/data/cms/upload_files/20160526/14642295206944.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/14642295206944.png',	31,	'.png',	'14642295206944.png',	'',	'14514859938878.png',	NULL,	NULL,	0),
(159,	0,	1464230408,	'/data/cms/upload_files/20160526/14642304085212.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/14642304085212.jpg',	128,	'.jpg',	'14642304085212.jpg',	'',	'14596187948250.jpg',	NULL,	NULL,	0),
(160,	0,	1464230547,	'/data/cms/upload_files/20160526/14642305479271.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/14642305479271.jpg',	79,	'.jpg',	'14642305479271.jpg',	'',	'家族慈善（英文）.jpg',	NULL,	NULL,	0),
(161,	0,	1464230607,	'/data/cms/upload_files/20160526/14642306078645.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/14642306078645.jpg',	28,	'.jpg',	'14642306078645.jpg',	'',	'专注（英文）.jpg',	NULL,	NULL,	0),
(162,	0,	1464230616,	'/data/cms/upload_files/20160526/14642306161561.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/14642306161561.jpg',	61,	'.jpg',	'14642306161561.jpg',	'',	'连接（英文）.jpg',	NULL,	NULL,	0),
(163,	0,	1464230623,	'/data/cms/upload_files/20160526/14642306234456.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/14642306234456.jpg',	44,	'.jpg',	'14642306234456.jpg',	'',	'给予（英文）.jpg',	NULL,	NULL,	0),
(164,	0,	1464230631,	'/data/cms/upload_files/20160526/14642306314103.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/14642306314103.jpg',	37,	'.jpg',	'14642306314103.jpg',	'',	'关心（英文）.jpg',	NULL,	NULL,	0),
(165,	0,	1464230638,	'/data/cms/upload_files/20160526/14642306387242.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160526/14642306387242.jpg',	65,	'.jpg',	'14642306387242.jpg',	'',	'家族（英文）.jpg',	NULL,	NULL,	0),
(166,	0,	1464323186,	'/data/cms/upload_files/20160527/14643231866900.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643231866900.jpg',	77,	'.jpg',	'14643231866900.jpg',	'',	'家族财富保障-轮播1-banner--五个世纪的守望.jpg',	NULL,	NULL,	0),
(167,	0,	1464323209,	'/data/cms/upload_files/20160527/14643232099085.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643232099085.jpg',	86,	'.jpg',	'14643232099085.jpg',	'',	'家族财富保障- 轮播2 banner- 英文版-雪山.jpg',	NULL,	NULL,	0),
(168,	0,	1464323228,	'/data/cms/upload_files/20160527/14643232283755.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643232283755.jpg',	74,	'.jpg',	'14643232283755.jpg',	'',	'家族财富保障 轮播3 banner- 英文版 -飓风.jpg',	NULL,	NULL,	0),
(169,	0,	1464323238,	'/data/cms/upload_files/20160527/14643232385097.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643232385097.jpg',	105,	'.jpg',	'14643232385097.jpg',	'',	'家族财富保障 轮播4 banner- 英文版火星.jpg',	NULL,	NULL,	0),
(170,	0,	1464323303,	'/data/cms/upload_files/20160527/14643233034896.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643233034896.jpg',	123,	'.jpg',	'14643233034896.jpg',	'',	'首页轮播 -英文.jpg',	NULL,	NULL,	0),
(171,	0,	1464340720,	'/data/cms/upload_files/20160527/14643407204072.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643407204072.jpg',	80,	'.jpg',	'14643407204072.jpg',	'',	'连接（英文）.jpg',	NULL,	NULL,	0),
(172,	0,	1464340776,	'/data/cms/upload_files/20160527/14643407766080.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643407766080.jpg',	77,	'.jpg',	'14643407766080.jpg',	'',	'家族财富保障-轮播1-banner--五个世纪的守望.jpg',	NULL,	NULL,	0),
(173,	0,	1464340809,	'/data/cms/upload_files/20160527/14643408099292.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643408099292.jpg',	86,	'.jpg',	'14643408099292.jpg',	'',	'家族财富保障- 轮播2 banner- 英文版-雪山.jpg',	NULL,	NULL,	0),
(174,	0,	1464340834,	'/data/cms/upload_files/20160527/14643408341394.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643408341394.jpg',	74,	'.jpg',	'14643408341394.jpg',	'',	'家族财富保障 轮播3 banner- 英文版 -飓风.jpg',	NULL,	NULL,	0),
(175,	0,	1464340846,	'/data/cms/upload_files/20160527/14643408468059.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643408468059.jpg',	105,	'.jpg',	'14643408468059.jpg',	'',	'家族财富保障 轮播4 banner- 英文版火星.jpg',	NULL,	NULL,	0),
(176,	0,	1464340931,	'/data/cms/upload_files/20160527/14643409316962.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643409316962.jpg',	111,	'.jpg',	'14643409316962.jpg',	'',	'家族慈善 banner --英文网站.jpg',	NULL,	NULL,	0),
(177,	0,	1464341501,	'/data/cms/upload_files/20160527/14643415018702.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160527/14643415018702.jpg',	71,	'.jpg',	'14643415018702.jpg',	'',	'家族研究院（英文）.jpg',	NULL,	NULL,	0),
(178,	0,	1464578353,	'/data/cms/upload_files/20160530/14645783524051.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645783524051.jpg',	120,	'.jpg',	'14645783524051.jpg',	'',	'家族慈善-banner---英文网站.jpg',	NULL,	NULL,	0),
(179,	0,	1464579311,	'/data/cms/upload_files/20160530/14645793119706.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645793119706.jpg',	122,	'.jpg',	'14645793119706.jpg',	'',	'家族研究院（英文）-cc改.jpg',	NULL,	NULL,	0),
(180,	0,	1464579377,	'/data/cms/upload_files/20160530/14645793775634.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645793775634.jpg',	120,	'.jpg',	'14645793775634.jpg',	'',	'家族慈善-banner---英文网站.jpg',	NULL,	NULL,	0),
(181,	0,	1464579517,	'/data/cms/upload_files/20160530/14645795174861.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645795174861.jpg',	120,	'.jpg',	'14645795174861.jpg',	'',	'家族慈善-banner---英文网站--.jpg',	NULL,	NULL,	0),
(182,	0,	1464579572,	'/data/cms/upload_files/20160530/14645795725846.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645795725846.jpg',	120,	'.jpg',	'14645795725846.jpg',	'',	'家族慈善-banner---英文网站--.jpg',	NULL,	NULL,	0),
(183,	0,	1464587612,	'/data/cms/upload_files/20160530/14645876123821.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645876123821.jpg',	128,	'.jpg',	'14645876123821.jpg',	'',	'网站-轮播-火星.jpg',	NULL,	NULL,	0),
(184,	0,	1464587624,	'/data/cms/upload_files/20160530/14645876242382.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645876242382.jpg',	66,	'.jpg',	'14645876242382.jpg',	'',	'网站-轮播-banner--飓风.jpg',	NULL,	NULL,	0),
(185,	0,	1464587668,	'/data/cms/upload_files/20160530/14645876681845.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645876681845.jpg',	93,	'.jpg',	'14645876681845.jpg',	'',	'网站-轮播-banner--雪山.jpg',	NULL,	NULL,	0),
(186,	0,	1464588508,	'/data/cms/upload_files/20160530/14645885085635.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645885085635.jpg',	128,	'.jpg',	'14645885085635.jpg',	'',	'网站-轮播-banner--火星-替换.jpg',	NULL,	NULL,	0),
(187,	0,	1464588586,	'/data/cms/upload_files/20160530/14645885866432.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645885866432.jpg',	120,	'.jpg',	'14645885866432.jpg',	'',	'家族慈善-banner---英文网站.jpg',	NULL,	NULL,	0),
(188,	0,	1464596465,	'/data/cms/upload_files/20160530/14645964655470.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645964655470.jpg',	67,	'.jpg',	'14645964655470.jpg',	'',	'网站-轮播-banner--飓风.jpg',	NULL,	NULL,	0),
(189,	0,	1464596535,	'/data/cms/upload_files/20160530/14645965357429.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160530/14645965357429.jpg',	67,	'.jpg',	'14645965357429.jpg',	'',	'网站-轮播-banner--飓风.jpg',	NULL,	NULL,	0),
(190,	0,	1464854691,	'/data/cms/upload_files/20160602/14648546917076.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160602/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160602/14648546917076.jpg',	122,	'.jpg',	'14648546917076.jpg',	'',	'家族研究院（英文）-cc改2.jpg',	NULL,	NULL,	0),
(191,	0,	1464856585,	'/data/cms/upload_files/20160602/14648565856827.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160602/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160602/14648565856827.jpg',	124,	'.jpg',	'14648565856827.jpg',	'',	'家族研究院（英文）-cc改2.jpg',	NULL,	NULL,	0),
(192,	0,	1464858632,	'/data/cms/upload_files/20160602/14648586322253.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160602/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160602/14648586322253.jpg',	238,	'.jpg',	'14648586322253.jpg',	'',	'20150803.jpg',	NULL,	NULL,	0),
(193,	0,	1464926002,	'/data/cms/upload_files/20160603/14649260028393.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649260028393.jpg',	16,	'.jpg',	'14649260028393.jpg',	'',	'14634489769994.jpg',	NULL,	NULL,	0),
(194,	0,	1464926031,	'/data/cms/upload_files/20160603/14649260311343.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649260311343.jpg',	103,	'.jpg',	'14649260311343.jpg',	'',	'14634489728268.jpg',	NULL,	NULL,	0),
(195,	0,	1464926081,	'/data/cms/upload_files/20160603/14649260814157.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649260814157.jpg',	97,	'.jpg',	'14649260814157.jpg',	'',	'14634490452340.jpg',	NULL,	NULL,	0),
(196,	0,	1464926108,	'/data/cms/upload_files/20160603/14649261081561.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649261081561.jpg',	35,	'.jpg',	'14649261081561.jpg',	'',	'14634490488725.jpg',	NULL,	NULL,	0),
(197,	0,	1464932735,	'/data/cms/upload_files/20160603/14649327351239.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649327351239.png',	16,	'.png',	'14649327351239.png',	'',	'20140901.png',	NULL,	NULL,	0),
(198,	0,	1464934282,	'/data/cms/upload_files/20160603/14649342824141.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649342824141.png',	112,	'.png',	'14649342824141.png',	'',	'20150528-1.png',	NULL,	NULL,	0),
(199,	0,	1464934288,	'/data/cms/upload_files/20160603/14649342888115.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649342888115.png',	161,	'.png',	'14649342888115.png',	'',	'20150528-2.png',	NULL,	NULL,	0),
(200,	0,	1464934300,	'/data/cms/upload_files/20160603/14649343001998.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649343001998.png',	112,	'.png',	'14649343001998.png',	'',	'20150528-1.png',	NULL,	NULL,	0),
(201,	0,	1464934312,	'/data/cms/upload_files/20160603/14649343123598.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649343123598.png',	161,	'.png',	'14649343123598.png',	'',	'20150528-2.png',	NULL,	NULL,	0),
(202,	0,	1464934484,	'/data/cms/upload_files/20160603/14649344847784.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649344847784.png',	55,	'.png',	'14649344847784.png',	'',	'20150625.png',	NULL,	NULL,	0),
(203,	0,	1464934585,	'/data/cms/upload_files/20160603/14649345857499.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649345857499.jpg',	46,	'.jpg',	'14649345857499.jpg',	'',	'20150920-1.jpg',	NULL,	NULL,	0),
(204,	0,	1464934590,	'/data/cms/upload_files/20160603/14649345902217.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649345902217.jpg',	21,	'.jpg',	'14649345902217.jpg',	'',	'20150920-2.jpg',	NULL,	NULL,	0),
(205,	0,	1464934598,	'/data/cms/upload_files/20160603/14649345988032.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649345988032.jpg',	48,	'.jpg',	'14649345988032.jpg',	'',	'20150920-3.jpg',	NULL,	NULL,	0),
(206,	0,	1464935118,	'/data/cms/upload_files/20160603/14649351188741.png',	'image/png',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649351188741.png',	324,	'.png',	'14649351188741.png',	'',	'20151112-1.png',	NULL,	NULL,	0),
(207,	0,	1464935127,	'/data/cms/upload_files/20160603/14649351272091.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649351272091.jpg',	89,	'.jpg',	'14649351272091.jpg',	'',	'20151112-2.jpg',	NULL,	NULL,	0),
(208,	0,	1464937639,	'/data/cms/upload_files/20160603/14649376396772.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160603/14649376396772.jpg',	195,	'.jpg',	'14649376396772.jpg',	'',	'20151116.jpg',	NULL,	NULL,	0),
(209,	0,	1466131341,	'/data/cms/upload_files/20160617/14661313411648.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160617/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160617/14661313411648.jpg',	201,	'.jpg',	'14661313411648.jpg',	'',	'5776.jpg_wh1200_.jpg',	NULL,	NULL,	0),
(210,	0,	1466131345,	'/data/cms/upload_files/20160617/14661313456568.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160617/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160617/14661313456568.jpg',	201,	'.jpg',	'14661313456568.jpg',	'',	'5776.jpg_wh1200_.jpg',	NULL,	NULL,	0),
(211,	0,	1466135105,	'/data/cms/upload_files/20160617/14661351059550.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160617/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160617/14661351059550.jpg',	123,	'.jpg',	'14661351059550.jpg',	'',	'家族研究院（英文）-cc改.jpg',	NULL,	NULL,	0),
(212,	0,	1466491347,	'/data/cms/upload_files/20160621/14664913478486.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160621/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160621/14664913478486.jpg',	35,	'.jpg',	'14664913478486.jpg',	'',	'14649261081561.jpg',	NULL,	NULL,	0),
(213,	0,	1466491351,	'/data/cms/upload_files/20160621/14664913516649.jpg',	'image/jpeg',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160621/',	'/data/www/default/2015/enhanjia/data/cms/upload_files/20160621/14664913516649.jpg',	35,	'.jpg',	'14664913516649.jpg',	'',	'14649261081561.jpg',	NULL,	NULL,	0);

DROP TABLE IF EXISTS `omp_block`;
CREATE TABLE `omp_block` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_block` (`id`, `title`, `aid`, `status`) VALUES
(1,	'测试呵呵',	1,	2),
(2,	'另一个测试',	2,	2),
(3,	'首页banner文字描述',	3,	1),
(4,	'漢家族简介',	5,	1),
(5,	'家族财富保障简介',	6,	1),
(6,	'家族家族LEARN生活简介',	7,	1),
(7,	'漢家族banner文字描述',	14,	1),
(8,	'家族财富保障banner文字描述',	18,	1),
(9,	'家族慈善banner图文字描述',	19,	1),
(10,	'家族慈善介绍Charity Service ',	20,	1),
(11,	'慈善服务内容Services Offered ',	21,	1),
(12,	'漢家族研究院banner图文字描述',	29,	1),
(13,	'家族LEARN生活banner文字描述',	33,	1),
(14,	'家族LEARN生活具体内容',	34,	1),
(15,	'联系我们：客户',	53,	1),
(16,	'家族财富保障补充',	72,	1),
(17,	'联系我们：合作',	83,	1),
(18,	'漢家族页面内容',	91,	1);

DROP TABLE IF EXISTS `omp_column`;
CREATE TABLE `omp_column` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `reid` int(11) NOT NULL COMMENT '上级栏目id，如果为顶级栏目则为0',
  `sort` int(10) unsigned NOT NULL COMMENT '排序',
  `name` varchar(30) NOT NULL COMMENT '栏目名称',
  `eng_name` varchar(30) DEFAULT NULL COMMENT '英文名称',
  `category_template` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目首页模板',
  `list_template` varchar(255) NOT NULL DEFAULT '' COMMENT '列表页模板',
  `show_template` varchar(255) NOT NULL DEFAULT '' COMMENT '内容页模板',
  `ispart` varchar(10) NOT NULL COMMENT '栏目属性',
  `info_model` smallint(5) unsigned NOT NULL COMMENT '信息模型id',
  `picid` int(10) unsigned DEFAULT NULL COMMENT '栏目图片id',
  `is_nav` smallint(5) NOT NULL COMMENT '是否在导航栏显示，0不显示，1显示',
  `is_open` smallint(5) NOT NULL COMMENT '是否在新窗口打开，0不打开，1打开',
  `is_exist` smallint(5) NOT NULL COMMENT '是否存在页面，0不存在，1存在',
  `out_chain` varchar(255) DEFAULT NULL COMMENT '外链',
  `seo_title` varchar(30) DEFAULT NULL COMMENT 'SEO标题',
  `keywords` varchar(60) DEFAULT NULL COMMENT '关键字',
  `description` varchar(150) NOT NULL COMMENT '描述',
  `searchtype` tinyint(4) DEFAULT '0' COMMENT '搜索类型 1 搜索 127 非搜索',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '状态，0正常，1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_column` (`id`, `reid`, `sort`, `name`, `eng_name`, `category_template`, `list_template`, `show_template`, `ispart`, `info_model`, `picid`, `is_nav`, `is_open`, `is_exist`, `out_chain`, `seo_title`, `keywords`, `description`, `searchtype`, `status`) VALUES
(1,	0,	50,	'漢家',	'hanjia',	'',	'',	'',	'catalog',	0,	0,	0,	0,	0,	'',	'',	'',	'',	127,	0),
(2,	0,	50,	'HMCFO',	'about_us',	'',	'templates/shtml/application/list_about_us.shtml',	'',	'doc',	1,	44,	1,	0,	0,	'',	'',	'',	'',	127,	0),
(3,	0,	50,	'Family Wealth Management',	'wealth',	'',	'templates/shtml/application/list_wealth.shtml',	'templates/shtml/application/show_wealth_detail.shtml',	'doc',	4,	190,	1,	0,	0,	'',	'',	'',	'',	127,	0),
(4,	0,	50,	' Family Charity',	'charity',	'templates/shtml/application/category_charity.shtml',	'',	'',	'catalog',	0,	182,	1,	0,	1,	'',	'',	'',	'',	127,	0),
(5,	0,	50,	'Research Institute',	'institute',	'',	'templates/shtml/application/list_institute.shtml',	'templates/shtml/application/show_institute_detail.shtml',	'doc',	1,	211,	1,	0,	0,	'',	'',	'',	'',	127,	0),
(6,	0,	50,	'LEARN Lifestyle',	'learn',	'templates/shtml/application/category_learn.shtml',	'',	'',	'catalog',	0,	117,	1,	0,	1,	'',	'',	'',	'',	127,	0),
(7,	1,	50,	'首页banner图管理',	'banner',	'',	'',	'',	'doc',	3,	0,	0,	0,	0,	'',	'',	'',	'',	127,	0),
(8,	4,	50,	'EV Foundation',	'yihui',	'',	'',	'templates/shtml/application/show_charity_yihui_detail.shtml',	'page',	5,	0,	1,	0,	0,	'',	'',	'',	'',	127,	0),
(9,	4,	50,	'Care Foundation',	'love',	'',	'',	'templates/shtml/application/show_charity_love_detail.shtml',	'page',	6,	0,	1,	0,	0,	'',	'',	'',	'',	127,	0),
(10,	4,	50,	'关爱基金下载列表',	'love_file',	'',	'',	'',	'doc',	7,	0,	1,	0,	0,	NULL,	'',	'',	'',	127,	1),
(11,	1,	50,	'questionnaire',	'questionnaire',	'',	'',	'templates/shtml/application/show_questionnaire_1.shtml',	'form',	8,	0,	1,	0,	0,	'',	'',	'',	'',	127,	0),
(12,	0,	50,	'<a href=\"baidu.com\">测试</a>',	'<script type=\"javascript:;\">al',	'',	'',	'',	'catalog',	0,	NULL,	1,	0,	0,	NULL,	NULL,	NULL,	'',	127,	1),
(13,	1,	50,	'风险评估',	'risk',	'',	'',	'templates/shtml/application/show_questionnaire_2.shtml',	'form',	9,	0,	1,	0,	0,	NULL,	'',	'',	'',	127,	0),
(14,	1,	50,	'意见箱',	'idea',	'',	'',	'',	'form',	10,	0,	1,	0,	0,	NULL,	'',	'',	'',	127,	0),
(15,	0,	50,	'新闻资讯',	'news',	'templates/shtml/application/category_news.shtml',	'',	'',	'catalog',	0,	0,	1,	0,	1,	'',	'',	'',	'',	127,	0),
(16,	15,	50,	'Dynamic',	'dynamic',	'',	'templates/shtml/application/list_news_1.shtml',	'templates/shtml/application/show_news_detail.shtml',	'doc',	11,	0,	0,	0,	0,	'',	'',	'',	'',	127,	0),
(17,	15,	50,	'Information',	'information',	'',	'templates/shtml/application/list_news_2.shtml',	'templates/shtml/application/show_news_detail.shtml',	'doc',	11,	0,	1,	0,	0,	'',	'',	'',	'',	127,	0),
(18,	4,	50,	'关爱大事记',	'affairs',	'',	'',	'',	'doc',	12,	0,	1,	0,	0,	'',	'',	'',	'',	127,	0),
(19,	1,	50,	'Contact us',	'Contact_us',	'',	'',	'templates/shtml/application/show_contact.shtml',	'form',	13,	0,	1,	0,	0,	'',	'',	'',	'',	127,	0),
(20,	1,	50,	'漢家族banner管理',	'hanjiazubanner',	'',	'',	'',	'doc',	14,	0,	1,	0,	0,	NULL,	'',	'',	'',	127,	0),
(21,	1,	50,	'家族财富保障banner管理',	'caifubanner',	'',	'',	'',	'doc',	14,	0,	1,	0,	0,	NULL,	'',	'',	'',	127,	0),
(22,	15,	50,	'图片',	'pic',	'',	'templates/shtml/application/list_news_piclist.shtml',	'templates/shtml/application/show_img_list02.shtml',	'doc',	16,	0,	1,	0,	0,	NULL,	'',	'',	'',	127,	0),
(23,	1,	50,	'传家翡翠信息',	'chuanjia',	'',	'',	'',	'doc',	15,	0,	1,	0,	0,	'',	'',	'',	'',	127,	0),
(24,	1,	50,	'传家翡翠轮播',	'cjfc',	'',	'',	'',	'doc',	17,	0,	1,	0,	0,	NULL,	'',	'',	'',	127,	0),
(25,	1,	50,	'家族慈善banner管理',	'charitybanner',	'',	'',	'',	'doc',	14,	0,	1,	0,	0,	NULL,	'',	'',	'',	127,	0),
(26,	1,	50,	'关于我们',	'aboutusv',	'',	'',	'',	'doc',	1,	0,	0,	0,	0,	'',	'',	'',	'',	127,	0);

DROP TABLE IF EXISTS `omp_login_log`;
CREATE TABLE `omp_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自动编号',
  `typeid` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1 app 2 web',
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '密码',
  `logintime` int(11) NOT NULL DEFAULT '0' COMMENT '登录时间',
  `loginip` int(11) NOT NULL DEFAULT '0' COMMENT '登录IP',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理员登录日志';

INSERT INTO `omp_login_log` (`id`, `typeid`, `username`, `password`, `logintime`, `loginip`, `status`) VALUES
(1,	1,	'admin',	'abcc12345',	1449548358,	2130706433,	0),
(2,	1,	'admin',	'abc',	1453963226,	1877017378,	0),
(3,	1,	'admin',	'admin',	1458547953,	465252696,	0),
(4,	1,	'admin',	'3edc$RFFV',	1458547958,	465252696,	0),
(5,	1,	'admin',	'3edc$RFV',	1458557061,	1875047953,	0),
(6,	1,	'admin',	'3edc$RFV',	1458557067,	1875047953,	0),
(7,	1,	'admin',	'3edc$RFV',	1458620412,	1875047953,	0),
(8,	1,	'admin',	'abc.123',	1458620418,	1875047953,	0),
(9,	1,	'admin',	'3edc$RFV',	1458620534,	1971847813,	0),
(10,	1,	'admin',	'3edc$RFV',	1463118381,	2147483647,	0),
(11,	1,	'admin',	'123456',	1463118385,	2147483647,	0),
(12,	1,	'admin',	'admin',	1463118388,	2147483647,	0),
(13,	1,	'admin',	'3edc$RFV',	1463118394,	2147483647,	0),
(14,	1,	'admin',	'jcJC5610',	1463118398,	2147483647,	0),
(15,	1,	'admin',	'hanjiazu',	1463118401,	2147483647,	0),
(16,	1,	'admin',	'888888',	1463118427,	2147483647,	0),
(17,	1,	'admin',	'3edc$RFV',	1463440322,	1875496156,	0),
(18,	1,	'admin',	'12345',	1464074188,	1877017247,	0),
(19,	1,	'admin',	'3edc$RFV',	1464078897,	2147483647,	0),
(20,	1,	'admin',	'3edc$RFV',	1464170846,	2147483647,	0),
(21,	1,	'admin',	'3edc$RFV',	1464342383,	2147483647,	0),
(22,	1,	'admin',	'abc12345 ',	1464588498,	2084677202,	0),
(23,	1,	'admin',	'abc12345 ',	1466130915,	2084677202,	0),
(24,	1,	'admin',	'abc12345 ',	1466130948,	2084677202,	0),
(25,	1,	'admin',	'3edc$RFV',	1466480495,	465233395,	0),
(26,	1,	'admin',	'abc123',	1466480499,	465233395,	0),
(27,	1,	'admin',	'ab12345',	1466665105,	2084677202,	0),
(28,	1,	'admin',	'admin',	1467346178,	1875045704,	0),
(29,	1,	'admin',	'abc123456',	1467346696,	1875045704,	0),
(30,	1,	'admin',	'3edc$RFV',	1467346710,	1877081727,	0),
(31,	1,	'admin',	'abc123456',	1467346812,	1875045704,	0),
(32,	1,	'admin',	' abc12345',	1470117615,	2084677202,	0),
(33,	1,	'admin',	' abc12345',	1470117618,	2084677202,	0),
(34,	1,	'admin',	'abc12345',	1470120320,	2084677202,	0);

DROP TABLE IF EXISTS `omp_member`;
CREATE TABLE `omp_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `reg_time` int(10) NOT NULL,
  `last_time` int(10) NOT NULL,
  `status` tinyint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_member` (`id`, `username`, `password`, `email`, `phone`, `reg_time`, `last_time`, `status`) VALUES
(1,	'abc@qq.com',	'd6b0ab7f1c8ab8f53101d8d5ac56addd',	'abc@qq.com',	'13313325638',	0,	0,	1),
(2,	'2504767240@qq.com',	'aafbdbdb324ba27d05946432ade37b54',	'2504767240@qq.com',	'13313325678',	0,	1452674052,	1),
(3,	'liulu2504767240@163.com',	'd6b0ab7f1c8ab8f53101d8d5ac56addd',	'liulu2504767240@163.com',	'13313325633',	1449570369,	0,	1),
(4,	'1368074250@qq.com',	'2e4a29533deec93bd5ba5327007fdacd',	'1368074250@qq.com',	'15920149641',	1451459592,	1451459656,	1),
(5,	'529599749@qq.com',	'ac21403db229c2865ad6e3052c06f6ab',	'529599749@qq.com',	'15824501688',	1451727315,	1451729886,	1),
(6,	'425828985@qq.com',	'1adbb3178591fd5b6d092c763ed18b0e',	'425828985@qq.com',	'15807617368',	1452063400,	1452063400,	1),
(7,	'oasiseekers@qq.com',	'54f7df1fb72b2ef0cff2582326d9f9f7',	'oasiseekers@qq.com',	'18565882769',	1452063516,	1452063516,	1),
(8,	'2353324388@qq.com',	'df1bfa7d7bd6666409b06056caed9030',	'2353324388@qq.com',	'13335353636',	1452241071,	1452241071,	1),
(9,	'hudson@hmcfo.com',	'43e9649eaa1fe6dcee4d9ddfd15105ef',	'hudson@hmcfo.com',	'18612039550',	1452503935,	1452503935,	1),
(10,	'apseeq@sina.com',	'9c462bc795303170716f1ce21d2790be',	'apseeq@sina.com',	'13911719722',	1453094095,	1453094095,	1);

DROP TABLE IF EXISTS `omp_menu`;
CREATE TABLE `omp_menu` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单ID',
  `reid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类',
  `name` char(20) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `image` char(100) DEFAULT '' COMMENT '菜单图片',
  `nodeid` smallint(5) unsigned DEFAULT '0' COMMENT '菜单对应的节点ID',
  `parameter` varchar(100) DEFAULT '' COMMENT '额外参数',
  `url` varchar(100) DEFAULT '' COMMENT '外部链接',
  `description` char(100) DEFAULT '' COMMENT '菜单描述',
  `target` char(15) DEFAULT 'main' COMMENT '打开窗口类型',
  `style` char(15) DEFAULT '' COMMENT '菜单样式',
  `js` char(100) DEFAULT '' COMMENT 'JS',
  `isopen` tinyint(1) unsigned DEFAULT '0' COMMENT '默认是否展开 0不展开 1展开',
  `sort` smallint(5) DEFAULT '10' COMMENT '排序',
  `is_check` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 0待审核 1正常',
  PRIMARY KEY (`id`),
  KEY `reid` (`reid`,`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='全站菜单节点';

INSERT INTO `omp_menu` (`id`, `reid`, `name`, `image`, `nodeid`, `parameter`, `url`, `description`, `target`, `style`, `js`, `isopen`, `sort`, `is_check`) VALUES
(2,	0,	'平台账户',	NULL,	288,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	10,	1),
(3,	2,	'账户管理',	NULL,	289,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	10,	1),
(4,	2,	'账户组',	NULL,	293,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	10,	1),
(6,	0,	'平台管理',	NULL,	272,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	10,	1),
(7,	6,	'平台设置',	NULL,	273,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	2,	1),
(9,	6,	'平台菜单',	NULL,	285,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	1,	1),
(10,	6,	'权限节点',	NULL,	283,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	10,	0),
(39,	6,	'整站搜索',	NULL,	355,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	10,	0),
(13,	6,	'登录日志',	NULL,	299,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	3,	1),
(40,	6,	'分类管理',	NULL,	358,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	10,	0),
(36,	27,	'栏目列表',	NULL,	347,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	3,	1),
(37,	27,	'回收站',	NULL,	270,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	2,	0),
(38,	27,	'添加栏目',	NULL,	348,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	4,	1),
(27,	0,	'信息管理',	NULL,	265,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	1,	1),
(28,	27,	'信息列表',	NULL,	266,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	1,	0),
(34,	27,	'模型管理',	NULL,	338,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	5,	1),
(46,	6,	'数据库备份/还原',	NULL,	366,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	10,	0),
(47,	6,	'关联选项',	NULL,	371,	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	10,	1),
(48,	27,	'碎片管理',	'',	373,	'',	'',	'',	'',	'',	'',	NULL,	5,	1),
(49,	27,	'会员管理',	'',	378,	'',	'',	'',	'',	'',	'',	NULL,	10,	1);

DROP TABLE IF EXISTS `omp_model_doc_1`;
CREATE TABLE `omp_model_doc_1` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '关键字',
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '描述',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `adddate` int(10) NOT NULL DEFAULT '0' COMMENT '发布日期',
  `pic` int(10) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `subtitle` varchar(255) NOT NULL DEFAULT '',
  `sort` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_doc_1` (`id`, `unitid`, `title`, `status`, `pubdate`, `keywords`, `description`, `content`, `adddate`, `pic`, `subtitle`, `sort`) VALUES
(1,	2,	'Prosperity for Five  Centuries and Beyond ',	1,	1444732059,	'',	'',	'8',	1444731754,	104,	'',	'1'),
(2,	2,	'Completely focused,  totally professional',	1,	1444732059,	'',	'',	'9',	1444731802,	105,	'',	'2'),
(3,	2,	'Measurable wealth and  the immeasurable value  of ',	1,	1444732059,	'',	'',	'10',	1444731852,	106,	'',	'3'),
(4,	2,	'From one generation to  hundreds of generations',	1,	1444732059,	'',	'',	'11',	1444731875,	107,	'',	'4'),
(5,	2,	'Restoring the Ancient  Way, Rebuilding the  “Castl',	1,	1444732059,	'',	'',	'12',	1444732012,	108,	'',	'5'),
(6,	2,	'Creating a Family  Legacy, Establishing an  Everla',	1,	1444732059,	'',	'',	'13',	1444732035,	109,	'',	'6'),
(7,	5,	'China Family Office White Paper',	1,	1444892888,	'',	'For ultra high net worth Chinese families, the ongoing economic globalization is an unprecedented challenge,but also an opportunity.They need optimal international practice strategies to manage their enterprises so they can expand their businesses into overseas markets, keep domestic and overseas assets independent of each other and deal with the multi-jurisdiction tax system. At the same time, their social responsibilities are also steadily increasing in line with their greater influence. In the ten years ahead, ultrahighnetworth families’ enterprises will pass into the hands of the next generation, but it remains a critically important question as to how to maintain the cohesive force of the family and ensure the inheritance process is smooth. In short, how do we realize the sustainable succession of a business empire? ',	'30',	1444892677,	21,	'Family Office Industry White Paper ',	'1'),
(8,	5,	'Chinese Family Survival Environment Research Report',	1,	1444892888,	'',	'For ultra high net worth Chinese families, the ongoing economic globalization is undoubtedly an unprecedented challenge, but also an opportunity. With the rapid globalization of the Chinese economy and the deepening of reform and opening-up, the top echelon of financially successful Chinese families need to have a clear understanding of the domestic and international situation so they can apply a globalized vision in deciding the future direction of their development. ',	'31',	1444892749,	22,	'Chinese Family survival Environment Research Report',	'2'),
(9,	5,	'Wealth Succession over three Generations White Paper',	1,	1444892888,	'',	'There’s a well-known Chinese saying that goes,“a rich family can’t maintain its wealth for more than three generations”. In fact, that saying is not totally groundless. A family business study made by J. Astrachan indicates that 30% of family enterprises can survive to the 2nd generation, 9% to the 3rd but only 3% to the 4th. The study shows that intergenerational succession can be the leading killer of wealth unless there is careful planning and arrangements. ',	'32',	1444892835,	23,	'Wealth Succession over three Generations White Paper',	'3'),
(10,	26,	'汉家族页面',	1,	1465184123,	'',	'',	'113',	1465184096,	0,	'',	'');

DROP TABLE IF EXISTS `omp_model_doc_11`;
CREATE TABLE `omp_model_doc_11` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '关键字',
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '描述',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `adddate` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_doc_11` (`id`, `unitid`, `title`, `status`, `pubdate`, `keywords`, `description`, `content`, `adddate`) VALUES
(1,	16,	'漢家族|中国家族传承之闭门论坛暨中国首份家族办公室行业白皮书发布',	1,	1449541855,	'',	'2015年1月25日 深圳 中国家族传承之闭门论坛暨中国首份家族办公室行业白皮书发布即将开幕。 ',	'35',	1449541717),
(2,	16,	'漢家族|中国家族传承之闭门论坛暨中国首份家族办公室行业白皮书发布',	1,	1449541855,	'',	'2015年1月25日 深圳 中国家族传承之闭门论坛暨中国首份家族办公室行业白皮书发布即将开幕。',	'36',	1449541785),
(3,	16,	'漢家族|中国家族传承之闭门论坛暨中国首份家族办公室行业白皮书发布',	1,	1449541855,	'',	'2015年1月25日 深圳 中国家族传承之闭门论坛暨中国首份家族办公室行业白皮书发布即将开幕。',	'37',	1449541823),
(4,	16,	'漢家族|中国家族传承之闭门论坛暨中国首份家族办公室行业白皮书发布',	1,	1449541855,	'',	'2015年1月25日 深圳 中国家族传承之闭门论坛暨中国首份家族办公室行业白皮书发布即将开幕。',	'38',	1449541842),
(5,	17,	'漢•家族办公室荣获“亚洲品牌十大创新企业”奖',	1,	1449541959,	'',	'2014年9月9日晚，有着亚洲品牌年度“奥斯卡”之称的第9届“亚洲品牌盛典”活动在香港亚洲电视台圆满落幕，作为中国第一家 符合国际标 准的家族办公室——漢•家族办公室荣获“亚洲品牌十大创新企业”大奖，这是中国家族办公室行业里，唯一获得此项 殊荣的企业。 ',	'39',	1449541871),
(6,	17,	'24岁的中国人成为世界上最年轻的亿万富豪',	1,	1449541959,	'',	'2014年9月9日晚，有着亚洲品牌年度“奥斯卡”之称的第9届“亚洲品牌盛典”活动在香港亚洲电视台圆满落幕，作为中国第一家 符合国际标 准的家族办公室——漢•家族办公室荣获“亚洲品牌十大创新企业”大奖，这是中国家族办公室行业里，唯一获得此项 殊荣的企业。',	'40',	1449541882),
(7,	17,	'中国瓷碗拍卖成交价为3630万美元，创下新的记录',	1,	1449541959,	'',	'2014年9月9日晚，有着亚洲品牌年度“奥斯卡”之称的第9届“亚洲品牌盛典”活动在香港亚洲电视台圆满落幕，作为中国第一家 符合国际标 准的家族办公室——漢•家族办公室荣获“亚洲品牌十大创新企业”大奖，这是中国家族办公室行业里，唯一获得此项 殊荣的企业。 ',	'41',	1449541897),
(8,	17,	'漢•家族办公室荣获“亚洲品牌十大创新企业”奖',	1,	1449541959,	'',	'2014年9月9日晚，有着亚洲品牌年度“奥斯卡”之称的第9届“亚洲品牌盛典”活动在香港亚洲电视台圆满落幕，作为中国第一家 符合国际标 准的家族办公室——漢•家族办公室荣获“亚洲品牌十大创新企业”大奖，这是中国家族办公室行业里，唯一获得此项 殊荣的企业。 ',	'42',	1449541914),
(9,	17,	'24岁的中国人成为世界上最年轻的亿万富豪',	1,	1449541959,	'',	'2014年9月9日晚，有着亚洲品牌年度“奥斯卡”之称的第9届“亚洲品牌盛典”活动在香港亚洲电视台圆满落幕，作为中国第一家 符合国际标 准的家族办公室——漢•家族办公室荣获“亚洲品牌十大创新企业”大奖，这是中国家族办公室行业里，唯一获得此项 殊荣的企业。 ',	'43',	1449541929),
(10,	17,	'中国瓷碗拍卖成交价为3630万美元，创下新的记录',	1,	1449541959,	'',	'2014年9月9日晚，有着亚洲品牌年度“奥斯卡”之称的第9届“亚洲品牌盛典”活动在香港亚洲电视台圆满落幕，作为中国第一家 符合国际标 准的家族办公室——漢•家族办公室荣获“亚洲品牌十大创新企业”大奖，这是中国家族办公室行业里，唯一获得此项 殊荣的企业。',	'44',	1449541943);

DROP TABLE IF EXISTS `omp_model_doc_12`;
CREATE TABLE `omp_model_doc_12` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `adddate` int(10) NOT NULL DEFAULT '0' COMMENT '时间',
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '描述',
  `eng_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '英文描述',
  `pics` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '图片集',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_doc_12` (`id`, `unitid`, `title`, `status`, `pubdate`, `adddate`, `desc`, `eng_desc`, `pics`) VALUES
(1,	18,	'July 2, 2012',	1,	1451473872,	1341212080,	'Care Foundation is formally established.',	'',	''),
(2,	18,	'June 4, 2013',	1,	1451473872,	1338793384,	'Zhongshe Social Work Development Foundation becomes 72nd organization to pass the 2012 annual inspection by the Ministry of Civil Affairs. ',	'Zhongshe　Social Work Development　Foundation became the　72th foundation that　passed the 2012 annual　inspection by the Ministry　of Civil Affairs',	''),
(3,	18,	'October 16, 2013',	1,	1451473872,	1381907028,	'A total of 12 people, including the council members and staff of Care Foundation, visit “Shepherd’s Field”, “Fujia Disabled Orphan Home” and “Wonderful Love Children’s Home”. The Care Foundation members visited the children, the rehabilitation facilities and environment and training systems, held detailed discussions with the organizations and participated in the children’s stimulating and loving rehabilitation activities.  ',	'',	'25,27'),
(4,	18,	'November 19, 2013',	1,	1451473872,	1384844749,	'Care Foundation donates ¥190,000 treatment fee to help leukemia sufferer Song Zihan at Roundabout China.',	'',	'29'),
(5,	18,	'November 28 , 2013',	1,	1451473872,	1385622431,	'Care Foundation successfully holds 2nd charity gala, called “Angel’s Night”. ',	'The 2nd ‘Night of Angels’ Charity Gala Dinner was held successfully.',	'30,31'),
(6,	18,	'December 10, 2013',	1,	1451473872,	1386659293,	'A total of 16 people, including people from Care Foundation and volunteers, visit “New Day Foster Home”, discussing cooperation with its founder and making “New Day Foster Home” a Care Foundationfixed training base.Care Foundation plans to explore and establish a standardized model for non-governmental disabled orphan aid organizations in China based on the relatively mature model and system of “New Day Foster Home” in order to effectively assist non-governmental children’s aid agencies and disabled orphans. ',	'Volunteers from The Care Foundation visited New Day Foster Home and talked with its founder to learn more about the operation and management experience of the New Day Foster Home.',	'33,34,35'),
(7,	18,	'December 23 , 2013',	1,	1451473872,	1387782557,	'Care Foundation completes checking and confirming all the money raised at the charity dinner held on November 28. ',	'Fulfilled all required checks and balances for all donations at the Charity Gala Dinner 2013',	''),
(8,	18,	'啊啊啊啊',	2,	0,	1449558631,	'',	'',	''),
(9,	18,	'测试',	2,	1451472107,	1387795283,	'这是一个测试',	'',	''),
(10,	18,	'February 24 , 2014',	1,	1451473872,	1393239337,	'Care Foundation visits Mephibosheth Village in Ruzhou County, Henan Province, despite heavy fog and haze blanketing the area from Beijing to Henan.\n\n\nFebruary 25，2014\nCare Foundation donates¥1 million to Bainian Vocational School, which provides free vocational education to children from poor families. ',	'',	'139,140'),
(11,	18,	'2014年2月25日',	2,	1451473872,	1393325855,	'关爱基金向百年职校资助人民币100万元，支持参与到免费职业教育中，为孤残儿童今后回归社会接受免费教育奠定基础。',	'',	'53'),
(12,	18,	'March , 2014',	1,	1451473868,	1393671519,	'Care Foundation publishes its first annual report on its activities and achievements during the previous year, ensuring oversight of its work by partners and the public. ',	'',	'141'),
(13,	18,	'April 18 , 2014',	1,	1451473868,	1397818796,	'Care Foundation donates ¥2,132,000 to Beijing Dali Charity Foundation. All the money will be used to provide medical assistance todisabled orphans in China Care Home.',	'',	'142,143'),
(14,	18,	'June 5 , 2014',	1,	1451473868,	1401966089,	'A Non-Governmental Disabled Orphan Aid Standard and Capability Building project called “Lighting Hope with Care”(Phase I), jointly established by Care Foundation and New Day Foster Home in Beijing, is formally launched. The project aims to build a standardized non-governmental system for assisting disabled orphans and form a comprehensive non-governmental network, create a force of professional social workers and build professional volunteer service teams supported by quality social resources. ',	'',	'144,145'),
(15,	18,	'June 30, 2014',	1,	1451473868,	1404126174,	'Care Foundation donates ¥1 million to “Creating Chinese Spirit with One Heart” to help fund surgery for 24 children identified by the organizing team of the “Charity Trip to Diqing, Yunnan”. The children include sufferers of congenital heart disease from remote mountainous areas and needy children suffering from other diseases.',	'',	'146,147'),
(16,	18,	'July ,2014',	1,	1451473868,	1404644644,	'Care Foundation participates in a charity project to which it had donated, sending staff to witness the use of the funds to help children in need and provide help in the project.',	'',	'148'),
(17,	18,	'August 20 , 2014',	1,	1451473868,	1408532710,	'Care Foundation is invited to social organization professional knowledge training in Beijing organized by the Li KaShing Foundation. The training program, titled“The Development Status of China’s Charity Industry and the Foundation Policy Practice”, was led by Zhao Hua from the Peter F. Drucker NPOLearning Center. Care Foundation studied the professional theories and shared information and views with other charity organizations. Upholding the spirit of professional development, Care Foundation will continue to optimize strategies, standardize operation and innovate as it seeks to put theories into practice.',	'',	'149,150'),
(18,	18,	'September, 2014',	1,	1451486046,	1409569584,	'Care Foundation establishes a new volunteer team called Caring Angel Volunteer Corps to provide a professional platform for volunteers to exchange information and interact with each other.',	'',	'197'),
(19,	18,	'September 10 ,2014',	1,	1451486046,	1410347215,	'Care Foundation donates ¥129,600 to New Day Foster Home in Beijing to help buy 30 boxes, containing a total of 1080 cans, of milk powder for 20 disabled and orphaned children at the Children Welfare Institute of Ulanqab, Inner Mongolia. ',	'',	''),
(20,	18,	'October ,2014',	1,	1451486046,	1412161678,	'Care Foundation donates ¥100,000 to Beijing Chunmiao Children’s Aid Foundation as a special fund to be used for the raising, medical care and nursing of two premature infants.(The pictures are provided by Beijing Chunmiao Children’s Aid Foundation).',	'',	'152,153'),
(21,	18,	'October 21, 2014',	1,	1451486046,	1413889839,	'Care Foundation and China Youth University forPolitical Sciences work together to establish a social work expert consultant team to discuss a pilot service and implementation plan for the intervention of social work in the disabled orphan aid system, which marks the formal operation of “Social Work Love Bridge”, a sub-project of “Lighting Hope with Care”. With New Day Foster Home as the service pilot, the project aims to promote the application of scientific aid concepts and methods in the daily work of non-governmental aid organizations for orphans and disabled childrenso they can provide better service through the analysis of previous research and demand and the use of professional social work methods. ',	'',	''),
(22,	18,	'November 15, 2014',	1,	1451486046,	1416061555,	'Heart Choices Not Hard Choices, a workshop exploring the social worker+volunteer service model for the “Lighting Hope with Care”Project, is successfully held at New Day Foster Home in Beijing, the project’s practice base. Care Foundation, China Youth University for Political Sciences and China Association for Social Work Education co-hosted this public welfare event. In the form of a mini-workshop, the activity explored the social worker+volunteer service model and promoted the internal development of volunteer teams to enhance their professionalism and take full advantage of their individualskills to effectively help disabled orphans.',	'',	'154'),
(23,	18,	'December 5, 2014',	1,	1451486046,	1417789665,	'“Happy Pressure Reduction”, a group activity run as part of the “Lighting Hope with Care” Project’s Social Worker Love Bridge Program to strengthen the ability of children’s nurses to cope with stress is launched on the 29th International Volunteer Day. Professional social workers from Care Foundation and China Youth University for Political Sciencesorganized an interesting and meaningful activity to build stress tolerance amongchild care nurses at New Day Foster Home, which fully demonstrated the theme of the International Volunteer Day: “Make Change Happen”. ',	'',	'155'),
(24,	18,	'December 6, 2014',	1,	1451486046,	1417876148,	'Care Foundation is awarded “The Outstanding Contribution Award” by the Creating Chinese Spirit Fund of Beijing Red Cross Foundation at the Summary and Commending Conference of “Creating the Chinese Spirit with One Heart”, directed and organized by the United Front Work Department of CPC Central Committee and Beijing Red Cross Foundation.',	'',	'156'),
(25,	18,	'December 12, 2014',	1,	1451486046,	1418394646,	'Care Foundation is invited to “The 4thConferencefor Chinese Vulnerable Children’s Day and ‘Another Future—The Forum of Chinese Child Welfare and Protection System Construction’” event to discuss child protection and how to aid children with special needs with experts and front-line workers with children. It provided policy reference and theoretical guidance for the future development of Care Foundation. ',	'',	''),
(26,	18,	'December, 2014',	1,	1451486046,	1420036304,	'Another “Happy Stress Reduction” group activity is held as part of “Lighting Hope with Care” project’s“Social Worker Love Bridge” program. In two activities called “holding an umbrella for someone else” and “combating stress”, the professional social worker team continued to help child care nurses experience and explore ways of relieving stress suited to each individual. \nThe last activity, themed “Unlimited Communication and Team Enhancement”, was adventure training. With the guidance of professional coaches, it was a successful team-building exercise for the Care Foundation management team and promoted the improvement of child care nurses’ social support system.',	'',	'157,158'),
(27,	18,	'December, 2014',	1,	1451486046,	1417444417,	'Care Foundation makes individual donations to Wonderful Love Children’s Home, Fujia Disabled Orphan Home and Shepherd’s Field to help treat disabled orphans suffering from osteogenesis imperfecta, hernia and congenital heart disease. ',	'',	''),
(28,	18,	'May, 2014',	2,	1458548594,	1400660518,	'In May, Care Fund worked with Beijing New Day Foster Home on a year-long project compiling A Guide for the Construction and Services of Non-governmental Orphaned and Disabled Children Relief Agencies (Pilot Edition). The guide was completed through repeated practice, refining and assessment of relief processes. Based on the present situation of non-governmental orphaned and disabled children relief institutions, the guide summarizes the advanced technology and experience the leading agencies have accumulated in their past work.',	'In May, Care Fund worked with Beijing New Day Foster Home on a year-long project compiling A Guide for the Construction and Services of Non-governmental Orphaned and Disabled Children Relief Agencies (Pilot Edition). The guide was completed through repeated practice, refining and assessment of relief processes. Based on the present situation of non-governmental orphaned and disabled children relief institutions, the guide summarizes the advanced technology and experience the leading agencies have accumulated in their past work.',	''),
(29,	18,	'October 16, 2015',	2,	1458549056,	1444984111,	'Care Foundation invited experts from China Association of Social Welfare and Beijing Normal University to conduct a third-party professional evaluation and revision of A Guide for the Construction and Services of Non-Governmental Orphaned and Disabled Children Relief Agencies (Pilot Edition).',	'',	''),
(30,	18,	'November, 2015',	2,	1458549056,	1446366559,	'In November, the Chinese and English versions of A Guide for the Construction and Services of Non-Governmental Orphaned and Disabled Children Relief Agencies (Pilot Edition) were formally released. The guide covers six major aspects, including infrastructure and facility construction in non-governmental orphaned and disabled child relief organizations, primary education, nursing services and family fostering of orphaned and disabled children, and the management of orphaned and disabled children relief institutions. The guide will help non-governmental orphaned and disabled children relief organizations improve their facilities and services, and enhance their own development and the industry service level. It marks a solid step toward the construction of a standard system of evidence-based relief and fostering of orphaned and disabled children by non-governmental agencies.',	'In November, the Chinese and English versions of A Guide for the Construction and Services of Non-Governmental Orphaned and Disabled Children Relief Agencies (Pilot Edition) were formally released. The guide covers six major aspects, including infrastructure and facility construction in non-governmental orphaned and disabled child relief organizations, primary education, nursing services and family fostering of orphaned and disabled children, and the management of orphaned and disabled children relief institutions. The guide will help non-governmental orphaned and disabled children relief organizations improve their facilities and services, and enhance their own development and the industry service level. It marks a solid step toward the construction of a standard system of evidence-based relief and fostering of orphaned and disabled children by non-governmental agencies.',	''),
(31,	18,	'November 12, 2015',	2,	1458549056,	1447317011,	'On November 12, Mr. Yang Hui, the HMCFamily Office president and the founder of Care Fund, was invited to attend the Inauguration Ceremony of the China Global Philanthropy Institute and the Joint Philanthropy Education Initiative. Mr. Yang appeared at the ceremony together with Bill Gates, Ray Dalio and Ma Yun.',	'On November 12, Mr. Yang Hui, the HMCFamily Office president and the founder of Care Fund, was invited to attend the Inauguration Ceremony of the China Global Philanthropy Institute and the Joint Philanthropy Education Initiative. Mr. Yang appeared at the ceremony together with Bill Gates, Ray Dalio and Ma Yun.',	''),
(32,	18,	'February, 2015',	1,	1464857945,	1425027424,	'Care Foundation donated ¥100,000 to Fujia Disabled Orphan Home and ¥150,000 to Shepherd’s Field, two non-governmental orphaned and disabled children relief organizations the fund visited and determined to support in 2014. The money was to be spent treating children with congenital heart disease at the two orphan homes. ',	'',	''),
(33,	18,	'March, 2015',	1,	1464858110,	1425978024,	'Care Foundation was invited to participate in “The Charity Aid Seminar”, organized by Fuwai Hospital to discuss a joint relief mechanism for charity agencies and professional medical institutions to offer better and effective service for orphaned and disabled children.',	'',	''),
(34,	18,	'May, 2015',	1,	1464858317,	1432793428,	'Care Foundation worked with Beijing New Day Foster Home on a year-long project compiling A Guide for the Construction and Services of Non-governmental Orphaned and Disabled Children Relief Agencies (Pilot Edition). The guide was completed through repeated practice, refining and assessment of relief processes. Based on the present situation of non-governmental orphaned and disabled children relief institutions, the guide summarizes the advanced technology and experience the leading agencies have accumulated in their past work.',	'',	'200,201'),
(35,	18,	'June 25, 2015',	1,	1464858317,	1435223011,	'The sub-project “Social Work Love Bridge” was successfully completed. China Youth University for Political Sciences, as the project leader, submitted A Summary Report on the Pilot Service and Research of Social Work Intervention in the Orphaned and Disabled Children Relief System. A service model that combines social work with the orphaned and disabled children relief system through a relaxed and scientific pilot service and practical research was explored.',	'',	'202'),
(36,	18,	'July 10, 2015',	1,	1464858472,	1436519302,	'Care Foundation donated ¥900,000 to Tianjin HuaXia Organ Transplant Aid Foundation to support liver transplants for orphaned and disabled children at Beijing New Day Foster Home suffering from congenital biliary atresia.  ',	'',	''),
(37,	18,	'August 3,2015 ',	1,	1464858640,	1438592970,	'Popular actress and singer Qu Ying and well-kown Beijing TV host Wang Ye, as our love ambassadors, visited orphaned and disabled children at Care Foundation practice bases and helped publicize Love Hug, a “love relay” activity under the “Lighting Hope with Care” project.',	'',	'192'),
(38,	18,	'September 20, 2015',	1,	1464858925,	1442740420,	'Tthe Love Hug activity was formally launched. Leveraging the social influence of well-known personalities as charity ambassadors and social entrepreneurs, and making full use of online interaction and communication, the activity advocated the concept of “hugging the loved ones beside you”, and, through feeling and passing on love, was aimed at appealing to the public to focus on orphaned and disabled children and personally taking part in the campaign. The whole activity lasted 22 days and more than 1,000 people were directly involved. Over 20 star ambassadors, including Qu Ying, Wang Ye and famous Phoenix Satellite TV hostess Xu Gehui, together with a number of social entrepreneurs, participated in the love relay. ',	'',	'203,204,205'),
(39,	18,	'October 16, 2015',	1,	1464858925,	1444986883,	'Care Foundation invited experts from China Association of Social Welfare and Beijing Normal University to conduct a third-party professional evaluation and revision of A Guide for the Construction and Services of Non-Governmental Orphaned and Disabled Children Relief Agencies (Pilot Edition). ',	'',	''),
(40,	18,	'June 30,2015',	1,	1464934778,	1435645145,	'Care Foundation was invited to participate in capacity-building training organized by Zhongshe Social Work Development Foundation. The training was presented by an expert team from the Capability Building and Assess-ment Center, which focused on project management, brand influence and financial management. It was aimed at improving social service organizations’ professional capabilities so they can aid their target groups in a more evidence-based and effective way.',	'',	''),
(41,	18,	'November 16, 2015',	1,	1464934945,	1447654843,	'The Chinese and English versions of A Guide for the Construction and Services of Non-Governmental Orphaned and Disabled Children Relief Agencies (Pilot Edition) were formally released. The guide covers six major aspects, including infrastructure and facility construction in non-governmental orphaned and disabled child relief organizations, primary education, nursing services and family fostering of orphaned and disabled children, and the management of orphaned and disabled children relief institutions. The guide will help non-governmental orphaned and disabled children relief organizations improve their facilities and services, and enhance their own development and the industry service level. It marks a solid step toward the construction of a standard system of evidence-based relief and fostering of orphaned and disabled children by non-governmental agencies. ',	'',	'208'),
(42,	18,	'November 12, 2015',	1,	1464935009,	1447309371,	'On November 12, Mr. Yang Hui, the HMCFamily Office president and the founder of Care Foundation, was invited to attend the Inauguration Ceremony of the China Global Philanthropy Institute and the Joint Philanthropy Education Initiative. Mr. Yang appeared at the ceremony together with Bill Gates, Ray Dalio and Ma Yun.',	'',	'206,207');

DROP TABLE IF EXISTS `omp_model_doc_14`;
CREATE TABLE `omp_model_doc_14` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '副标题',
  `entitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '英文标题',
  `pic` int(10) NOT NULL DEFAULT '0' COMMENT 'banner图',
  `sort` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_doc_14` (`id`, `unitid`, `title`, `status`, `pubdate`, `subtitle`, `entitle`, `pic`, `sort`) VALUES
(1,	20,	'专注',	1,	1451470697,	'',	'Concentration',	161,	'1'),
(2,	20,	'连接',	1,	1451470697,	'',	'Connection',	171,	'2'),
(3,	20,	'给予',	1,	1451470697,	'',	'Contribution',	163,	'3'),
(4,	20,	'关心',	1,	1451470697,	'',	'Compassion',	164,	'4'),
(5,	20,	'家族',	1,	1451470697,	'',	'Community',	165,	'5'),
(6,	21,	'五个世纪的守望-广告',	1,	1459618799,	'',	'',	172,	''),
(7,	21,	'珠峰',	1,	1459618799,	'',	'',	185,	''),
(8,	21,	'飓风',	1,	1459618799,	'',	'',	189,	''),
(9,	21,	'火星',	1,	1459618799,	'',	'',	186,	''),
(10,	25,	'家族慈善',	1,	1464230420,	'',	'',	187,	''),
(11,	25,	'banner',	2,	1464323255,	'',	'banner',	166,	''),
(12,	25,	'banner',	2,	1464323255,	'',	'banner',	167,	''),
(13,	25,	'banner',	2,	1464323255,	'',	'banner',	168,	''),
(14,	25,	'banner',	2,	1464323255,	'',	'banner',	169,	'');

DROP TABLE IF EXISTS `omp_model_doc_15`;
CREATE TABLE `omp_model_doc_15` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `jianjie` text NOT NULL,
  `pics` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '图片集',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_doc_15` (`id`, `unitid`, `title`, `status`, `pubdate`, `jianjie`, `pics`) VALUES
(1,	23,	'翡翠',	1,	1459618883,	'The HMCFamily emeralds, as a manifestation of the success and blessings of the family, can be handed down from generation to generation. They’re more than just beautiful stones. They symbolize the elder generations’ struggles and ultimate victory over hardship and their love and hope for future generations.\n',	'126,127'),
(2,	23,	'翡翠',	1,	1459618883,	'The HMCFamily emeralds can be handed down for posterity either as valuable gifts or as treasured heirlooms symbolizing family traditions, feelings and love.',	'128,129');

DROP TABLE IF EXISTS `omp_model_doc_16`;
CREATE TABLE `omp_model_doc_16` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `pics` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '图片集',
  `sort` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `omp_model_doc_17`;
CREATE TABLE `omp_model_doc_17` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `des` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '简介',
  `small` int(10) NOT NULL DEFAULT '0' COMMENT '小图',
  `big` int(10) NOT NULL DEFAULT '0' COMMENT '大图',
  `sort` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_doc_17` (`id`, `unitid`, `title`, `status`, `pubdate`, `des`, `small`, `big`, `sort`) VALUES
(1,	24,	'翡翠方牌吊坠',	1,	1463449052,	'',	131,	130,	'0'),
(2,	24,	'翡翠圆扣吊坠',	1,	1463449052,	'',	196,	195,	''),
(3,	24,	'翡翠竹节吊坠',	1,	1463449052,	'',	135,	134,	''),
(4,	24,	'自在观音',	1,	1463449052,	'',	193,	194,	''),
(5,	24,	'1',	2,	1466131536,	'',	210,	209,	''),
(6,	24,	'吊坠',	1,	1466491391,	'',	213,	212,	'');

DROP TABLE IF EXISTS `omp_model_doc_3`;
CREATE TABLE `omp_model_doc_3` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `pic` int(10) NOT NULL DEFAULT '0' COMMENT '图片',
  `httpurl` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_doc_3` (`id`, `unitid`, `title`, `status`, `pubdate`, `pic`, `httpurl`) VALUES
(1,	7,	'品牌',	1,	1464079532,	115,	'about_us.html'),
(2,	7,	'1',	2,	1464323392,	138,	''),
(3,	7,	'活动',	1,	1464323392,	170,	'');

DROP TABLE IF EXISTS `omp_model_doc_4`;
CREATE TABLE `omp_model_doc_4` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '副标题',
  `atitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '文章标题',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '关键字',
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '描述',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `sort` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_doc_4` (`id`, `unitid`, `title`, `status`, `pubdate`, `subtitle`, `atitle`, `keywords`, `description`, `content`, `sort`) VALUES
(1,	3,	'Global Selected Hedge Fund',	1,	1444791309,	'Family Wealth Management',	'Global Selected Hedge Fund',	'',	'The HMCFamily Selected Fund established by the HMC international expert team helps your family select outstanding American and European hedge funds that can effectively insulate investment risks in China. ',	'15',	'1'),
(2,	3,	'Alternative Investment Funds',	1,	1444791309,	'Family Wealth Management',	'Alternative Investment Funds',	'',	'These are special funds established for families whose assets exceedUS$1 billion and can integrate the scarce resources available in the alternative capital market. They focus on instruments such as hedge funds, art funds, private equity funds, venture capital funds and real estate funds, among others. ',	'16',	'2'),
(3,	3,	'The Heirloom Emeralds ',	1,	1444791309,	'Family Wealth Management',	'The Heirloom Emeralds',	'',	'Fei cui, or emerald, is also known as emerald jade, blue jade, jadeite or Burmese jade. In ancient times, emerald was the name of a bird. As defined in Shuo Wen Jie Zi, the first Chinese dictionary, “Fei is the name of a red-feathered sparrow while cui is a kind of blue-feathered sparrow.” After its introduction into China, the emerald received its name due to its colors.  ',	'17',	'3');

DROP TABLE IF EXISTS `omp_model_form_10`;
CREATE TABLE `omp_model_form_10` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `check` int(10) NOT NULL,
  `idea` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '意见内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_form_10` (`id`, `unitid`, `title`, `status`, `pubdate`, `check`, `idea`) VALUES
(1,	14,	'2504767240@qq.com',	1,	1449472807,	1,	'呵呵'),
(2,	14,	'2504767240@qq.com',	1,	1449543021,	1,	'呵呵'),
(3,	14,	'2504767240@qq.com',	1,	1451466349,	1,	'然而并没有什么卵用'),
(4,	14,	'hudson@hmcfo.com',	1,	1452503945,	1,	'denglu');

DROP TABLE IF EXISTS `omp_model_form_13`;
CREATE TABLE `omp_model_form_13` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `check` int(10) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '类型',
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '电话',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '姓名',
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '留言',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_form_13` (`id`, `unitid`, `title`, `status`, `pubdate`, `check`, `type`, `phone`, `name`, `message`) VALUES
(1,	19,	'2504767240@qq.com',	1,	1449823363,	1,	'0',	'13313325638',	'呵呵',	'呵呵');

DROP TABLE IF EXISTS `omp_model_form_8`;
CREATE TABLE `omp_model_form_8` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `check` int(10) NOT NULL,
  `sex` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '性别',
  `education` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '最高学历',
  `income` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '个人的税前年收入',
  `is_married` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '是否已婚',
  `family_income` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '如果已婚，家庭年收入属于',
  `family_members` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '除您以外，还有几位家庭成员需要您供养',
  `assets` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '您的家庭净资产应归于以下哪一类',
  `birthday` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_form_8` (`id`, `unitid`, `title`, `status`, `pubdate`, `check`, `sex`, `education`, `income`, `is_married`, `family_income`, `family_members`, `assets`, `birthday`) VALUES
(1,	0,	'',	0,	0,	0,	'0',	'1',	'0',	'1',	'0',	'2',	'0',	1994),
(2,	11,	'2504767240@qq.com',	1,	1449211482,	1,	'0',	'1',	'0',	'1',	'0',	'2',	'0',	1994),
(3,	11,	'2504767240@qq.com',	1,	1449211825,	1,	'0',	'1',	'0',	'1',	'0',	'2',	'0',	1994),
(4,	11,	'2504767240@qq.com',	1,	1449212154,	1,	'0',	'1',	'0',	'1',	'0',	'2',	'0',	773683200),
(5,	11,	'liulu2504767240@163.com',	1,	1449570416,	1,	'1',	'3',	'4',	'1',	'4',	'0',	'4',	-487584000),
(6,	11,	'apseeq@sina.com',	1,	1453094165,	1,	'0',	'1',	'0',	'0',	'0',	'4',	'0',	398102400);

DROP TABLE IF EXISTS `omp_model_form_9`;
CREATE TABLE `omp_model_form_9` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `check` int(10) NOT NULL,
  `bear` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '与别人相比，在承受投资风险方面，您如何评价自己？',
  `loss` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '您如何看待投资亏损？',
  `word` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '当您在金融的环境中考虑“风险”一词时，您最先想到哪个词？',
  `is_investment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '您是否曾为了博取差价而将大笔资金投入某项有风险的投资？',
  `work` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '如果您要在非常稳定但薪水涨幅小的工作和很不稳定但薪水涨幅大的工作之间进行选择，您会选择哪一个？',
  `attention` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '当您面临投资决策时，您更关心的是潜在的损失还是潜在的收益？',
  `feel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '当您做出投资决策以后，您会感到',
  `reward` varchar(255) NOT NULL DEFAULT '',
  `pasttimes` varchar(255) NOT NULL DEFAULT '',
  `risk` varchar(255) NOT NULL DEFAULT '',
  `experience` varchar(255) NOT NULL DEFAULT '',
  `confidence` varchar(255) NOT NULL DEFAULT '',
  `hypothesis` varchar(255) NOT NULL DEFAULT '',
  `uneasy` varchar(255) NOT NULL DEFAULT '',
  `hypothesis_2` varchar(255) NOT NULL DEFAULT '',
  `combination` varchar(255) NOT NULL DEFAULT '',
  `consider` varchar(255) NOT NULL DEFAULT '',
  `purchasing` varchar(255) NOT NULL DEFAULT '',
  `change` varchar(255) NOT NULL DEFAULT '',
  `problem_1` varchar(255) NOT NULL DEFAULT '',
  `problem_2` varchar(255) NOT NULL DEFAULT '',
  `problem_3` varchar(255) NOT NULL DEFAULT '',
  `problem_4` varchar(255) NOT NULL DEFAULT '',
  `problem_5` varchar(255) NOT NULL DEFAULT '',
  `problem_6` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_form_9` (`id`, `unitid`, `title`, `status`, `pubdate`, `check`, `bear`, `loss`, `word`, `is_investment`, `work`, `attention`, `feel`, `reward`, `pasttimes`, `risk`, `experience`, `confidence`, `hypothesis`, `uneasy`, `hypothesis_2`, `combination`, `consider`, `purchasing`, `change`, `problem_1`, `problem_2`, `problem_3`, `problem_4`, `problem_5`, `problem_6`) VALUES
(1,	13,	'2504767240@qq.com',	1,	1449212590,	1,	'0',	'1',	'1',	'0',	'4',	'1',	'1',	'1',	'1',	'3',	'1',	'4',	'1',	'5',	'1',	'4',	'3',	'1',	'1',	'1',	'1',	'1',	'1',	'1',	'1'),
(2,	13,	'liulu2504767240@163.com',	1,	1449570508,	1,	'6',	'3',	'3',	'4',	'4',	'3',	'3',	'4',	'4',	'4',	'1',	'4',	'4',	'0',	'2',	'6',	'3',	'3',	'3',	'10',	'3',	'2',	'4',	'3',	'6'),
(3,	13,	'2504767240@qq.com',	1,	1451557210,	0,	'1',	'1',	'1',	'1',	'4',	'1',	'1',	'4',	'4',	'4',	'1',	'1',	'1',	'1',	'1',	'6',	'3',	'1',	'3',	'1',	'1',	'1',	'1',	'1',	'1');

DROP TABLE IF EXISTS `omp_model_page_2`;
CREATE TABLE `omp_model_page_2` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '关键字',
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '描述',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `pic` int(10) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `pic2` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `omp_model_page_5`;
CREATE TABLE `omp_model_page_5` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `pic` int(10) NOT NULL DEFAULT '0' COMMENT '底部图片(1903x176)',
  `pic2` int(10) NOT NULL DEFAULT '0' COMMENT '栏目页图片(169x44)',
  `pic3` int(10) NOT NULL DEFAULT '0' COMMENT '内容页标识图片(289x96)',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `description` text NOT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_page_5` (`id`, `unitid`, `title`, `status`, `pubdate`, `pic`, `pic2`, `pic3`, `content`, `description`, `keywords`) VALUES
(1,	8,	'EV Foundation',	1,	1444818560,	15,	119,	17,	'22',	'EV Foundation is devoted to promoting the sustainable development of public welfare, building a benevolent and caring society with positive energy and establishing an exchange platform of charity development for ultra-high net worth Chinese families. With building social “positive energy” as our mission, the foundation is aimed at encouraging the construction of a good social environment through funding programs that promote healthy social trends and achieve long-term benefits. ',	'');

DROP TABLE IF EXISTS `omp_model_page_6`;
CREATE TABLE `omp_model_page_6` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `unitid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `pic` int(10) NOT NULL DEFAULT '0' COMMENT '栏目页图片(210x41)',
  `pic2` int(10) NOT NULL DEFAULT '0' COMMENT '内容页图片(120x100)',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `content_2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '关爱宗旨',
  `content_3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '底部内容',
  `description` text NOT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_model_page_6` (`id`, `unitid`, `title`, `status`, `pubdate`, `pic`, `pic2`, `content`, `content_2`, `content_3`, `description`, `keywords`) VALUES
(1,	9,	'Care Foundation',	1,	1444872860,	118,	19,	'23',	'24',	'25',	'Care Foundation was formally founded by Mr. Yang Hui, President of the HMCFamily Office, and his wife in July 2012. It is a first-level special fund under the Zhongshe Social Work Development Foundation. ',	'');

DROP TABLE IF EXISTS `omp_models_config`;
CREATE TABLE `omp_models_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '模型名称',
  `type` varchar(255) NOT NULL DEFAULT '' COMMENT '模型类型',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '模型简介',
  `field` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '模型字段',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `omp_models_config` (`id`, `name`, `type`, `description`, `field`) VALUES
(1,	'文章模型',	'doc',	'文章模型',	'{\"1\":{\"field\":\"keywords\",\"title\":\"\\u5173\\u952e\\u5b57\",\"type\":\"text\",\"sort\":0,\"value\":[]},\"2\":{\"field\":\"description\",\"title\":\"\\u63cf\\u8ff0\",\"type\":\"textarea\",\"sort\":0,\"value\":[]},\"3\":{\"field\":\"content\",\"title\":\"\\u5185\\u5bb9\",\"type\":\"editor\",\"sort\":0,\"value\":[]},\"4\":{\"field\":\"adddate\",\"title\":\"\\u53d1\\u5e03\\u65e5\\u671f\",\"type\":\"date\",\"sort\":0,\"value\":[]},\"5\":{\"field\":\"pic\",\"title\":\"\\u7f29\\u7565\\u56fe\",\"type\":\"pic\",\"sort\":0,\"value\":[]},\"6\":{\"field\":\"subtitle\",\"title\":\"\\u526f\\u6807\\u9898\",\"type\":\"text\",\"sort\":\"1\",\"value\":[]},\"7\":{\"field\":\"sort\",\"title\":\"\\u6392\\u5e8f\",\"type\":\"text\",\"sort\":0,\"value\":[]}}'),
(2,	'页面模型',	'page',	'页面模型',	'{\"1\":{\"field\":\"keywords\",\"title\":\"\\u5173\\u952e\\u5b57\",\"type\":\"text\",\"sort\":0,\"value\":[]},\"2\":{\"field\":\"description\",\"title\":\"\\u63cf\\u8ff0\",\"type\":\"textarea\",\"sort\":0,\"value\":[]},\"3\":{\"field\":\"content\",\"title\":\"\\u5185\\u5bb9\",\"type\":\"editor\",\"sort\":0,\"value\":[]},\"4\":{\"field\":\"pic\",\"title\":\"\\u7f29\\u7565\\u56fe(\\u672a\\u9009\\u4e2d)\",\"type\":\"pic\",\"sort\":0,\"value\":[]},\"5\":{\"field\":\"pic2\",\"title\":\"\\u7f29\\u7565\\u56fe2(\\u9009\\u4e2d)\",\"type\":\"pic\",\"sort\":0,\"value\":[]}}'),
(3,	'单图片模型',	'doc',	'单图片模型',	'{\"1\":{\"field\":\"pic\",\"title\":\"\\u56fe\\u7247\",\"type\":\"pic\",\"sort\":0,\"value\":[]},\"3\":{\"field\":\"httpurl\",\"title\":\"\\u94fe\\u63a5\",\"type\":\"text\",\"sort\":0,\"value\":[]}}'),
(4,	'家族财富保障模型',	'doc',	'家族财富保障模型',	'{\"1\":{\"field\":\"subtitle\",\"title\":\"\\u526f\\u6807\\u9898\",\"type\":\"text\",\"sort\":\"10\",\"value\":[]},\"2\":{\"field\":\"atitle\",\"title\":\"\\u6587\\u7ae0\\u6807\\u9898\",\"type\":\"text\",\"sort\":\"9\",\"value\":[]},\"3\":{\"field\":\"keywords\",\"title\":\"\\u5173\\u952e\\u5b57\",\"type\":\"text\",\"sort\":\"8\",\"value\":[]},\"4\":{\"field\":\"description\",\"title\":\"\\u63cf\\u8ff0\",\"type\":\"textarea\",\"sort\":\"7\",\"value\":[]},\"5\":{\"field\":\"content\",\"title\":\"\\u5185\\u5bb9\",\"type\":\"editor\",\"sort\":0,\"value\":[]},\"6\":{\"field\":\"sort\",\"title\":\"\\u6392\\u5e8f\",\"type\":\"text\",\"sort\":0,\"value\":[]}}'),
(5,	'熠辉基金模型',	'page',	'熠辉基金模型',	'{\"1\":{\"field\":\"pic\",\"title\":\"\\u5e95\\u90e8\\u56fe\\u7247(1903x176)\",\"type\":\"pic\",\"sort\":0,\"value\":[]},\"2\":{\"field\":\"pic2\",\"title\":\"\\u680f\\u76ee\\u9875\\u56fe\\u7247(169x44)\",\"type\":\"pic\",\"sort\":0,\"value\":[]},\"3\":{\"field\":\"pic3\",\"title\":\"\\u5185\\u5bb9\\u9875\\u6807\\u8bc6\\u56fe\\u7247(289x96)\",\"type\":\"pic\",\"sort\":0,\"value\":[]},\"4\":{\"field\":\"content\",\"title\":\"\\u5185\\u5bb9\",\"type\":\"editor\",\"sort\":0,\"value\":[]},\"5\":{\"field\":\"description\",\"title\":\"\\u63cf\\u8ff0\",\"type\":\"textarea\",\"sort\":0,\"value\":[]},\"6\":{\"field\":\"keywords\",\"title\":\"\\u5173\\u952e\\u5b57\",\"type\":\"text\",\"sort\":0,\"value\":[]}}'),
(6,	'关爱基金模型',	'page',	'关爱基金模型',	'{\"1\":{\"field\":\"pic\",\"title\":\"\\u680f\\u76ee\\u9875\\u56fe\\u7247(210x41)\",\"type\":\"pic\",\"sort\":0,\"value\":[]},\"2\":{\"field\":\"pic2\",\"title\":\"\\u5185\\u5bb9\\u9875\\u56fe\\u7247(120x100)\",\"type\":\"pic\",\"sort\":0,\"value\":[]},\"3\":{\"field\":\"content\",\"title\":\"\\u5185\\u5bb9\",\"type\":\"editor\",\"sort\":0,\"value\":[]},\"4\":{\"field\":\"content_2\",\"title\":\"\\u5173\\u7231\\u5b97\\u65e8\",\"type\":\"editor\",\"sort\":0,\"value\":[]},\"5\":{\"field\":\"content_3\",\"title\":\"\\u5e95\\u90e8\\u5185\\u5bb9\",\"type\":\"editor\",\"sort\":0,\"value\":[]},\"6\":{\"field\":\"description\",\"title\":\"\\u63cf\\u8ff0\",\"type\":\"textarea\",\"sort\":0,\"value\":[]},\"7\":{\"field\":\"keywords\",\"title\":\"\\u5173\\u952e\\u5b57\",\"type\":\"text\",\"sort\":0,\"value\":[]}}'),
(8,	'基本信息评估模型',	'form',	'基本信息评估模型',	'{\"1\":{\"field\":\"sex\",\"title\":\"\\u6027\\u522b\",\"type\":\"select\",\"sort\":0,\"value\":[\"Male\",\"Female\"]},\"2\":{\"field\":\"education\",\"title\":\"\\u6700\\u9ad8\\u5b66\\u5386\",\"type\":\"select\",\"sort\":0,\"value\":[\"Senior high school and under\",\"Junior college\",\"University degree\",\"Master degree and above\"]},\"3\":{\"field\":\"income\",\"title\":\"\\u4e2a\\u4eba\\u7684\\u7a0e\\u524d\\u5e74\\u6536\\u5165\",\"type\":\"select\",\"sort\":0,\"value\":[\"Under \\u00a510 million\",\"\\u00a510 million \\u2013\\u00a550 million\",\"\\u00a550 million \\u2013\\u00a5100 million\",\"\\u00a5100 million \\u2013\\u00a5500 million\",\"More than \\u00a5500 million\"]},\"4\":{\"field\":\"is_married\",\"title\":\"Are you married? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Yes\",\"No\"]},\"5\":{\"field\":\"family_income\",\"title\":\"If you\\u2019re married, which of the following represents your annual family income? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Under \\u00a510 million\",\"\\u00a510 million \\u2013\\u00a550 million\",\"\\u00a550 million \\u2013\\u00a5100 million\",\"\\u00a5100 million \\u2013\\u00a5500 million\",\"More than \\u00a5500 million\"]},\"6\":{\"field\":\"family_members\",\"title\":\"Apart from yourself, how many other family members do you need to support? \",\"type\":\"select\",\"sort\":0,\"value\":[\"None\",\"One\",\"Two\",\"Three\",\"Four or more\"]},\"7\":{\"field\":\"assets\",\"title\":\"What is your family net worth? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Under \\u00a5100 million\",\"\\u00a5100 million\\u2013\\u00a51 billion\",\"\\u00a51 billion\\u2013\\u00a55 billion\",\"\\u00a55 billion\\u2013\\u00a510 billion\",\"More than \\u00a510 billion\"]},\"8\":{\"field\":\"birthday\",\"title\":\"\\u51fa\\u751f\\u65e5\\u671f\",\"type\":\"date\",\"sort\":0,\"value\":[]}}'),
(9,	'风险评估模型',	'form',	'风险评估模型',	'{\"1\":{\"field\":\"bear\",\"title\":\"How do you evaluate yourself in terms of bearing investment risks?\",\"type\":\"select\",\"sort\":0,\"value\":[\"Extremely low risk bearer\",\"Very low risk bearer\",\"Low risk bearer\",\"Average risk bearer\",\"High risk bearer\",\"Very high risk bearer\",\"Extremely high risk bearer\"]},\"2\":{\"field\":\"loss\",\"title\":\"How do you see investment losses? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Difficult to accept as it will affect my normal life.\",\"They will have some influence on me\",\" but it won\\u2019t affect my normal life.\",\"Can accept it calmly and it won\\u2019t have anyobvious effecton my mood.\",\"Consider it a normal phenomenon as any investment carries risk and nobody can profit all the time.\"]},\"3\":{\"field\":\"word\",\"title\":\"When you think of \\u201crisk\\u201d in the financial environment, which of the following words comes to your mind first? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Danger\",\"Uncertainty\",\"Opportunity\",\"Excitement\"]},\"4\":{\"field\":\"is_investment\",\"title\":\"Have you ever put a large sum of money into a risky investment to gain bigger returns? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Never\",\"Seldom\",\"Yes\",\" but only sometimes\",\"Yes\",\" quite often\",\"Yes\",\" very often\"]},\"5\":{\"field\":\"work\",\"title\":\"Which job would you choose, a steady one with a low salary rise outlookor an unstable onewhich offers the prospect of big salary increases? \",\"type\":\"select\",\"sort\":0,\"value\":[\"The steady one for sure\",\"Maybe the steady one\",\"Not sure\",\"Maybe the unstable one\",\"The unstable one for sure\"]},\"6\":{\"field\":\"attention\",\"title\":\"When you have to make an investment decision, what are you more concerned about, potential losses or potential earnings? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Always the potential losses\",\"Sometimes the potential losses\",\"Sometimes the potential earnings\",\"Always the potential earnings\"]},\"7\":{\"field\":\"feel\",\"title\":\"After you make an investment decision, how do you feel?\",\"type\":\"select\",\"sort\":0,\"value\":[\"Very worried\",\"A little worried\",\"Quite confident\",\"Very confident\"]},\"8\":{\"field\":\"reward\",\"title\":\"How would you preferto be paid, a regular salary, performance commission or a combination of the two? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Totally regular pay\",\"\\uf0b7A bigger part as regular salary\",\"Half regular wage and half performance commission\",\"A bigger part as performance commission\",\"Totally performance commission\"]},\"9\":{\"field\":\"pasttimes\",\"title\":\"How much risk have you been prepared to bear in past investment activity? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Very low\",\"Low\",\"Medium\",\"High\",\"Very high\"]},\"10\":{\"field\":\"risk\",\"title\":\"What kind of investment risk are you prepared to take now? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Very low\",\"Low\",\"Average\",\"High\",\"Very high\"]},\"11\":{\"field\":\"experience\",\"title\":\"Have you ever borrowed money to invest? \",\"type\":\"select\",\"sort\":0,\"value\":[\"No\",\"Yes\"]},\"12\":{\"field\":\"confidence\",\"title\":\"Are you confident that you can make the right investment decision? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Not at all\",\"A little\",\"Quite confident\",\"Very confident\",\"Absolutely confident\"]},\"13\":{\"field\":\"hypothesis\",\"title\":\"Consider this scenario: You bought shares of a generally well-regardedcompany 5 years ago, but you sold them at a significant loss when the company suffered a serious business decline caused by mismanagement and the stock price fell drastically. Now the company has been restructured under a new management team and most experts expect the shares to generate high returns. Considering you suffered biglosses from owning shares in the company before, would you buy its shares again?  \",\"type\":\"select\",\"sort\":0,\"value\":[\"Absolutely not\",\"Maybe not\",\"Not sure\",\"Maybe yes\",\"Absolutely yes\"]},\"14\":{\"field\":\"uneasy\",\"title\":\"An investment may bring you profit or loss. Which of the following would worry you? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Any loss\",\"10%\",\"20%\",\"33%\",\"50%\",\"More than 50%\"]},\"15\":{\"field\":\"hypothesis_2\",\"title\":\"Consider this scenario: A distant relative has left you an old house after he passed away. The house happens to be located in arising suburb. If you sold it immediately, you\\u2019d get \\u00a53,000,000; if you spent \\u00a51,000,000 renovating it, you\\u2019d be able to sell it at \\u00a56,000,000. But it\\u2019s said a factory could be built beside the house, and that would decrease its value greatly. What would you do? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Sell it immediately\",\"Rent it out\",\"Obtain a loan of \\u00a51\",\"000\",\"000 to renovate it\"]},\"16\":{\"field\":\"combination\",\"title\":\"Most investment portfolios are composed of different types of investment products, some being high in expected yields and risks, and some low. For example, stocks and real estate investment belong to the former while deposits and bank financial products belong to the latter. Which of the following investment portfolios do you think is most attractive? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Portfolio 1\\t0%\\t              0%\\t           100%\",\"Portfolio 2 \\t0%\\t              30%\\t           70%\",\"Portfolio 3 \\t10%\\t          40%\\t           50%\",\"Portfolio 4 \\t30%\\t          40%\\t           30%\",\"Portfolio 5\\t50%\\t          40%\\t           10%\",\"Portfolio 6\\t70%\\t          30%\\t            0%\",\"Portfolio 7\\t100%\\t           0%\\t            0%\"]},\"17\":{\"field\":\"consider\",\"title\":\"Suppose you\\u2019re considering investing a quarter of your availablecapital in a project which is expected to generate earnings twice that of a fixed term deposit but doesn\\u2019t guarantee that you won\\u2019t lose your principal. What do you think the possibilities of suffering a loss are? \",\"type\":\"select\",\"sort\":0,\"value\":[\"50%\",\"Very low risk bearing\",\"Very little\",\"Not at all\"]},\"18\":{\"field\":\"purchasing\",\"title\":\"Some investments, such as cash and termdeposits, have a fixed value, but their purchasing power may reduce due to the effects of inflation. Some other investments, like stocks and equities, are fluid in value. Their value may be lower than the purchasing price in the short term but, in the long run, growth in their value is expected to beat inflation. Based on this concept, which of the following is more important to you, to guarantee that investment value doesn\\u2019t fall or retain purchasing power? \",\"type\":\"select\",\"sort\":0,\"value\":[\"That investment value doesn\\u2019t fall is most important\",\"That investment value doesn\\u2019t fall is more important\",\"To retain purchasing power is more important\",\"To retain purchasing power is most important\"]},\"19\":{\"field\":\"change\",\"title\":\"How has your personal investment changed in recent years? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Always stayed withlow risk\",\"Moved partly to low risk\",\"Moved partly to high risk\",\"Always stayed with high risk\"]},\"20\":{\"field\":\"problem_1\",\"title\":\"An investment usually means the coexistence of returns and risks. The higher the returns are, the higher the risks. How much available capital would you like to put in investments with returns and risks higher than the average? \",\"type\":\"select\",\"sort\":0,\"value\":[\"0%\",\"10%\",\"20%\",\"30%\",\"40%\",\"50%\",\"60%\",\"70%\",\"80%\",\"90%\",\"100%\"]},\"21\":{\"field\":\"problem_2\",\"title\":\"Compared with the return on a fixed term deposit, do you expect your rate of return on investment in the coming 10 years to be:\",\"type\":\"select\",\"sort\":0,\"value\":[\"Almost the same as that of a fixed term deposit\",\"Twice that of fixed term deposits\",\"Three times that of fixed term deposits\",\"Four times or higher than that of fixed term deposits\"]},\"22\":{\"field\":\"problem_3\",\"title\":\"People often make financial plans to obtain government benefits or tax incentives. However, legislation or other unforeseen circumstances may result in a worse outcome than if you had done nothing. Given that possibility, would you still risk planning your finances around obtaining those benefits? \",\"type\":\"select\",\"sort\":0,\"value\":[\"I wouldn\\u2019t if there is any possibility of making things worse\",\"I would if the possibility of making things worse is very small\",\"I would as long as there is a more than 50% possibility of making things better\"]},\"23\":{\"field\":\"problem_4\",\"title\":\"Suppose that you are considering getting a loan someday in the future, but you can\\u2019t predict how the interest rate will change. It may rise or fall. You can choose a floating rate or a fixed rate or a combination of the two. Which would you choose? \",\"type\":\"select\",\"sort\":0,\"value\":[\"100% fixed rate\",\"75% fixed rate and 25% floating rate\",\"50% fixed rate and 50% floating rate\",\"25% fixed rate and 75% floating rate\",\"100% floating rate\"]},\"24\":{\"field\":\"problem_5\",\"title\":\"Insurance helps cover the costs of the risks in our daily lives(such as fires, accidents and illnesses). How many insurance policies do you have? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Very few\",\"Some\",\"Quite a lot\",\"Enough to prevent risks\"]},\"25\":{\"field\":\"problem_6\",\"title\":\"If your risk tolerance is evaluated using a 100-point scoring system in which the higher the score, the higher your preparedness to accept risk, what\\u2019s your risk tolerance? \",\"type\":\"select\",\"sort\":0,\"value\":[\"Under 25 points\",\"25\\uff5e34 points\",\"35\\uff5e44 points\",\"45\\uff5e54 points\",\"55\\uff5e64 points\",\"65\\uff5e74 points\",\"Above 75 points\"]}}'),
(10,	'意见模型',	'form',	'意见模型',	'{\"1\":{\"field\":\"idea\",\"title\":\"\\u610f\\u89c1\\u5185\\u5bb9\",\"type\":\"textarea\",\"sort\":0,\"value\":[]}}'),
(11,	'新闻资讯模型',	'doc',	'新闻资讯模型',	'{\"1\":{\"field\":\"keywords\",\"title\":\"\\u5173\\u952e\\u5b57\",\"type\":\"text\",\"sort\":0,\"value\":[]},\"2\":{\"field\":\"description\",\"title\":\"\\u63cf\\u8ff0\",\"type\":\"textarea\",\"sort\":0,\"value\":[]},\"3\":{\"field\":\"content\",\"title\":\"\\u5185\\u5bb9\",\"type\":\"editor\",\"sort\":0,\"value\":[]},\"4\":{\"field\":\"adddate\",\"title\":\"\\u53d1\\u5e03\\u65f6\\u95f4\",\"type\":\"date\",\"sort\":0,\"value\":[]}}'),
(12,	'关爱大事记模型',	'doc',	'关爱大事记模型',	'{\"1\":{\"field\":\"adddate\",\"title\":\"\\u65f6\\u95f4\",\"type\":\"date\",\"sort\":0,\"value\":[]},\"2\":{\"field\":\"desc\",\"title\":\"\\u63cf\\u8ff0\",\"type\":\"textarea\",\"sort\":0,\"value\":[]},\"3\":{\"field\":\"eng_desc\",\"title\":\"\\u82f1\\u6587\\u63cf\\u8ff0\",\"type\":\"textarea\",\"sort\":0,\"value\":[]},\"4\":{\"field\":\"pics\",\"title\":\"\\u56fe\\u7247\\u96c6\",\"type\":\"pics\",\"sort\":0,\"value\":[]}}'),
(13,	'联系我们',	'form',	'联系我们',	'{\"1\":{\"field\":\"type\",\"title\":\"\\u7c7b\\u578b\",\"type\":\"select\",\"sort\":0,\"value\":[\"\\u5ba2\\u6237\",\"\\u5a92\\u4f53\",\"\\u5408\\u4f5c\"]},\"2\":{\"field\":\"phone\",\"title\":\"\\u7535\\u8bdd\",\"type\":\"text\",\"sort\":0,\"value\":[]},\"3\":{\"field\":\"name\",\"title\":\"\\u59d3\\u540d\",\"type\":\"text\",\"sort\":0,\"value\":[]},\"4\":{\"field\":\"message\",\"title\":\"\\u7559\\u8a00\",\"type\":\"textarea\",\"sort\":0,\"value\":[]}}'),
(14,	'漢家族banner模型',	'doc',	'漢家族banner模型',	'{\"1\":{\"field\":\"subtitle\",\"title\":\"\\u526f\\u6807\\u9898\",\"type\":\"text\",\"sort\":0,\"value\":[]},\"2\":{\"field\":\"entitle\",\"title\":\"\\u82f1\\u6587\\u6807\\u9898\",\"type\":\"text\",\"sort\":0,\"value\":[]},\"3\":{\"field\":\"pic\",\"title\":\"banner\\u56fe\",\"type\":\"pic\",\"sort\":0,\"value\":[]},\"4\":{\"field\":\"sort\",\"title\":\"\\u6392\\u5e8f\",\"type\":\"text\",\"sort\":0,\"value\":[]}}'),
(15,	'传家翡翠',	'doc',	'传家翡翠',	'{\"1\":{\"field\":\"jianjie\",\"title\":\"\\u7b80\\u4ecb\",\"type\":\"textarea\",\"sort\":0,\"value\":[]},\"2\":{\"field\":\"pics\",\"title\":\"\\u56fe\\u7247\\u96c6\",\"type\":\"pics\",\"sort\":0,\"value\":[]}}'),
(16,	'图片集模型',	'doc',	'图片集模型',	'{\"1\":{\"field\":\"pics\",\"title\":\"\\u56fe\\u7247\\u96c6\",\"type\":\"pics\",\"sort\":0,\"value\":[]},\"2\":{\"field\":\"sort\",\"title\":\"\\u6392\\u5e8f\",\"type\":\"text\",\"sort\":0,\"value\":[]}}'),
(17,	'传家翡翠轮播',	'doc',	'传家翡翠轮播',	'{\"1\":{\"field\":\"des\",\"title\":\"\\u7b80\\u4ecb\",\"type\":\"textarea\",\"sort\":0,\"value\":[]},\"2\":{\"field\":\"small\",\"title\":\"\\u5c0f\\u56fe\",\"type\":\"pic\",\"sort\":0,\"value\":[]},\"3\":{\"field\":\"big\",\"title\":\"\\u5927\\u56fe\",\"type\":\"pic\",\"sort\":0,\"value\":[]},\"4\":{\"field\":\"sort\",\"title\":\"\\u6392\\u5e8f\",\"type\":\"text\",\"sort\":0,\"value\":[]}}');

DROP TABLE IF EXISTS `omp_search`;
CREATE TABLE `omp_search` (
  `searchid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adddate` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`searchid`),
  KEY `typeid` (`typeid`,`id`),
  FULLTEXT KEY `data` (`data`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `omp_search_keyword`;
CREATE TABLE `omp_search_keyword` (
  `keyword` char(20) NOT NULL,
  `pinyin` char(20) NOT NULL,
  `searchnums` int(10) unsigned NOT NULL,
  `data` char(20) NOT NULL,
  UNIQUE KEY `keyword` (`keyword`),
  UNIQUE KEY `pinyin` (`pinyin`),
  FULLTEXT KEY `data` (`data`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `omp_stepselect`;
CREATE TABLE `omp_stepselect` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) DEFAULT NULL,
  `reid` mediumint(10) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `value` varchar(255) DEFAULT NULL,
  `column_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `omp_stepselect` (`id`, `name`, `reid`, `status`, `value`, `column_id`) VALUES
(31,	'地区1',	30,	0,	'',	0),
(30,	'测试',	0,	0,	NULL,	233);

DROP TABLE IF EXISTS `omp_sysconfig`;
CREATE TABLE `omp_sysconfig` (
  `id` smallint(8) unsigned NOT NULL AUTO_INCREMENT,
  `var_name` varchar(40) NOT NULL DEFAULT '' COMMENT '名称',
  `info` varchar(100) NOT NULL DEFAULT '' COMMENT '描述信息',
  `groupid` smallint(6) NOT NULL DEFAULT '1' COMMENT '组',
  `type` varchar(10) NOT NULL DEFAULT 'string' COMMENT '类型',
  `value` text COMMENT '值',
  PRIMARY KEY (`id`,`var_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置表';

INSERT INTO `omp_sysconfig` (`id`, `var_name`, `info`, `groupid`, `type`, `value`) VALUES
(38,	'seoKeywords',	'网站SEO关键词',	1,	'string',	'HMCFamily'),
(39,	'seoDescription',	'网站SEO描述',	1,	'string',	'HMCFamily'),
(35,	'siteName',	'平台名称',	1,	'string',	'HMCFamily'),
(37,	'seoSiteName',	'网站SEO名称',	1,	'string',	'HMCFamily'),
(40,	'copyright',	'版权信息',	1,	'string',	''),
(41,	'siteICP',	'网站备案信息',	1,	'string',	''),
(42,	'address',	'地址',	1,	'string',	''),
(46,	'smtp_host',	'smtp服务器',	1,	'string',	'smtp.163.com'),
(43,	'tel',	'电话',	1,	'string',	''),
(44,	'fax',	'传真',	1,	'string',	''),
(45,	'sitead',	'统计代码',	1,	'bstring',	''),
(36,	'key',	'系统秘钥',	1,	'string',	'ompcms'),
(47,	'smtp_user',	'smtp用户名',	1,	'string',	'liulu2504767240'),
(48,	'smtp_pass',	'smtp密码',	1,	'string',	''),
(49,	'smtp_port',	'smtp端口号',	1,	'string',	'25'),
(50,	'sender_email',	'发件人邮箱',	1,	'string',	'liulu2504767240@163.com'),
(51,	'sender_name',	'发件人名称',	1,	'string',	'liulu'),
(52,	'subject',	'邮件标题',	1,	'string',	'Email Test');

DROP TABLE IF EXISTS `omp_system_node`;
CREATE TABLE `omp_system_node` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '节点ID',
  `reid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `typeid` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0分组 1模块 2动作',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '节点名称',
  `code` char(30) NOT NULL DEFAULT '' COMMENT '权限标示',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '节点描述',
  `sort` smallint(6) NOT NULL DEFAULT '10' COMMENT '排序',
  `is_check` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 0禁用 1正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统全部操作节点，基本权限表';

INSERT INTO `omp_system_node` (`id`, `reid`, `typeid`, `name`, `code`, `description`, `sort`, `is_check`) VALUES
(265,	262,	2,	'信息管理',	'info',	'',	10,	1),
(266,	265,	3,	'信息查看',	'index',	'',	10,	1),
(267,	265,	3,	'信息添加',	'add',	'',	10,	1),
(268,	265,	3,	'信息修改',	'edit',	'',	10,	1),
(269,	265,	3,	'信息删除',	'del',	'',	10,	1),
(270,	265,	3,	'信息回收站',	'recycling',	'',	10,	1),
(346,	262,	2,	'栏目管理',	'column',	'',	10,	1),
(347,	346,	3,	'栏目列表',	'index',	'',	10,	1),
(348,	346,	3,	'栏目添加',	'add',	'',	10,	1),
(349,	346,	3,	'栏目修改',	'edit',	'',	10,	1),
(350,	346,	3,	'栏目删除',	'del',	'',	10,	1),
(337,	262,	2,	'模型管理',	'models',	'',	10,	1),
(338,	337,	3,	'模型查看',	'index',	'',	10,	1),
(339,	337,	3,	'模型添加',	'add',	'',	10,	1),
(340,	337,	3,	'模型编辑',	'edit',	'',	10,	1),
(341,	337,	3,	'模型删除',	'del',	'',	10,	1),
(272,	271,	2,	'平台设置',	'platform_setting',	'',	10,	1),
(273,	272,	3,	'查看设置',	'index',	'',	10,	1),
(274,	272,	3,	'更新设置',	'update',	'',	10,	1),
(297,	271,	2,	'安全中心',	'security_center',	'',	10,	1),
(362,	297,	3,	'操作日志',	'index',	'',	10,	0),
(299,	297,	3,	'登录日志',	'loginlog',	'',	10,	1),
(282,	271,	2,	'开发中心',	'development_center',	'',	10,	1),
(285,	282,	3,	'平台菜单查看',	'menu',	'',	10,	1),
(286,	282,	3,	'平台菜单添加',	'menuAdd',	'',	10,	1),
(287,	282,	3,	'平台菜单删除',	'menuDelete',	'',	10,	1),
(262,	0,	1,	'cms系统',	'content',	'',	10,	1),
(271,	0,	1,	'控制面板',	'control_panel',	'',	10,	1),
(288,	271,	2,	'平台账户',	'platform_account',	'',	10,	1),
(289,	288,	3,	'管理员查看',	'index',	'',	10,	1),
(290,	288,	3,	'管理员添加',	'add',	'',	10,	1),
(291,	288,	3,	'管理员修改',	'edit',	'',	10,	1),
(292,	288,	3,	'管理员删除',	'del',	'',	10,	1),
(293,	288,	3,	'管理组查看',	'group',	'',	10,	1),
(294,	288,	3,	'管理组添加',	'group_add',	'',	10,	1),
(295,	288,	3,	'管理组修改',	'group_edit',	'',	10,	1),
(296,	288,	3,	'管理组删除',	'group_del',	'',	10,	1),
(363,	265,	3,	'单页面信息',	'page',	'',	10,	1),
(364,	265,	3,	'信息发布',	'doaction',	'',	10,	1),
(365,	271,	2,	'数据库备份',	'sys_backup',	'',	10,	1),
(366,	365,	3,	'数据库备份',	'index',	'',	10,	1),
(367,	262,	2,	'关联选项',	'stepselect',	'',	10,	1),
(368,	367,	3,	'选项添加',	'add',	'',	10,	1),
(369,	367,	3,	'选项修改',	'edit',	'',	10,	1),
(370,	367,	3,	'选项删除',	'del',	'',	10,	1),
(371,	367,	3,	'选项列表',	'index',	'',	10,	1),
(372,	262,	2,	'碎片管理',	'block',	'',	10,	1),
(373,	372,	3,	'碎片列表',	'index',	'',	10,	1),
(374,	372,	3,	'添加碎片',	'add',	'',	10,	1),
(375,	372,	3,	'编辑碎片',	'edit',	'',	10,	1),
(376,	372,	3,	'删除碎片',	'del',	'',	10,	1),
(377,	262,	2,	'会员管理',	'member',	'',	10,	1),
(378,	377,	3,	'会员列表',	'index',	'',	10,	1),
(379,	377,	3,	'禁止登陆',	'del',	'',	10,	1);

DROP TABLE IF EXISTS `omp_validate`;
CREATE TABLE `omp_validate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `overduetime` int(10) unsigned NOT NULL,
  `key` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `omp_validate` (`id`, `username`, `overduetime`, `key`) VALUES
(30,	'abc@qq.com',	1449201079,	'KbRYh2c3z7KmlNWZPT'),
(31,	'529599749@qq.com',	1451729400,	'S30oThKK8t3mVFhG');

-- 2017-06-06 12:58:44
