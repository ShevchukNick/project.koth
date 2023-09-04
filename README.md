# Мой учебный проект - приложение "Король истории"

Главная задумка - создать площадку для соревнований для знатоков истории.

### Использованные технологии: PHP8, jQuery, Bootstap, MySQL

Приложение работает на самописном фреймворке. Реализован паттерн MVC, маршрутизация, для работы с БД используется библиотека RedBeanPHP.

### Логика следующая:
- юзер попадает на главную страницу с большим банером призывающим вступить в игру и выбрать тест, а также секцией с популярными тестами

  ![Image alt](https://github.com/ShevchukNick/project.koth/blob/master/1.png)
- юзер может перейти в меню "Тесты" где видит список всех доступных тестов
  
  ![Image alt](https://github.com/ShevchukNick/project.koth/blob/master/3.png)
- в навигационном меню есть поиск по сайту
  
  ![Image alt](https://github.com/ShevchukNick/project.koth/blob/master/4.png)
- юзер можно зарегистрироваться или авторизоваться
  
 ![Image alt](https://github.com/ShevchukNick/project.koth/blob/master/10.png)
 
 ![Image alt](https://github.com/ShevchukNick/project.koth/blob/master/9.png)
- валидация просиходит на сервере, используется библиотека Valitron
- юзер может и не регистрироваться, но тогда результаты его тестирования не сохраняются и он не участвует в соревновании
- успешно авторизованный юзер во вкладке меню может изменить свой аватар, учетные данные и посмотреть пройденные тесты

 ![Image alt](https://github.com/ShevchukNick/project.koth/blob/master/7.png)
- юзер выбирая тест начинает его решать, выбирая 1 из 4 из вариантов ответов
  
 ![Image alt](https://github.com/ShevchukNick/project.koth/blob/master/5.png)
- юзер в любой момент может нажать кнопку "Узнать результаты", тест заканчивается и ответы юзера сравниваются с правильными, а затем выдается результат
  
 ![Image alt](https://github.com/ShevchukNick/project.koth/blob/master/6.png)
- ответы юзера записываются в бд, 1 правильный ответ = 1 балл
- нажав на кнопку "Таблица лидеров" юзер может посмотреть какое место в общем рейтинге

![Image alt](https://github.com/ShevchukNick/project.koth/blob/master/11.png)
