Задача: Сделайте класс для работы с датами. Класс должен
уметь находить разницу между двумя датами, принимать
дату в sql-формате, а возвращать в заданном, принимать
дату в формате '31.12.2018', а возвращать в заданном.
Также класс должен должен определять текущий день
недели и месяц (словом, по-русски) и иметь для этого
соответствующие методы.
Класс должен иметь public свойство today, в котором хранится
текущая дата (заполняется в __construct).
Класс должен иметь public свойство weekday, в котором хранится
текущий день недели (по-русски).
Класс должен иметь public свойство month, в котором хранится
текущий месяц (по-русски).
Класс должен иметь и использовать private метод, который
принимает количество секунд $num, а возращает массив, в котором
содержится количество лет, месяцев, дней, часов, минут, секунд
в $num. Добавьте также несколько методов на свой вкус.