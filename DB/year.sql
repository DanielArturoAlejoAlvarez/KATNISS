--
-- Extract the years of `sales` made
--

SELECT YEAR(SALE_Date) year FROM sales GROUP BY year ORDER BY year DESC;

--
-- Extract the month,amount of `sales` made
--

SELECT MONTH(SALE_Date) AS month, SUM(SALE_Total) AS amount FROM sales WHERE SALE_Date BETWEEN '2020-01-01' AND '2020-01-23' GROUP BY month;