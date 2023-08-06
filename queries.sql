--1. Retrieve all the products that sell quickly
SELECT P.*, I.P_InStock, P_Date, P_Sold, P_Qoh
FROM Product P INNER JOIN Inventory I ON P.ProductID = I.ProductID
WHERE P_Qoh <= 5;

--2. Retrieve all the products that sell slowly
SELECT P.*, I.P_InStock, P_Date, P_Sold, P_Qoh
FROM Product P INNER JOIN Inventory I ON P.ProductID = I.ProductID
WHERE P_Qoh > 150;

--3. Retrieve all the current customers (from 2020 to 2023) from the Customer Table.
SELECT * FROM Customer WHERE CustomerID IN (SELECT DISTINCT CustomerID FROM Orders WHERE YEAR(O_Date) BETWEEN 2020 AND 2023);

--4. Retrieve all the customers whose accounts are overdue together with the respective products they purchased.
SELECT C.CustomerID, C.C_FirstName, C.C_LastName, O.OrderID, P.P_Name, P.P_Price, AR.AR_ID, AR.AR_Amount, AR.AR_DueDate
FROM Customer C
JOIN AccountsReceivable AR ON C.CustomerID = AR.CustomerID
JOIN Orders O ON C.CustomerID = O.CustomerID
JOIN OrdersProduct OP ON O.OrderID = OP.OrderID
JOIN Product P ON OP.ProductID = P.ProductID
WHERE AR.AR_DueDate < CURDATE() AND AR.AR_Status = 'Pending';