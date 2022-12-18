## Api to Get 6 items of rent and 6 of items for sell [✔ Done]

- http://localhost/Semsar.com/api/Items/ReadHome?[userId=1][&...filters]

## Api to Get Items For sell [✔ Done]

- http://localhost/Semsar.com/api/Items/Buy?[userId=1254][&...filters]

## Api to Get Items For rent [✔ Done]

- http://localhost/Semsar.com/api/Items/Rent?[userId=1254][&...filters]

## Api to Log in whit (JWT)

- http://localhost/Semsar.com/api/login?unm=anaana&psw=123

## Api to Create an Acount [✔ Done]

- http://localhost/Semsar.com/api/SignIn?[userName=KhalidTai]&[lname=khalid]&[fname=tailba]&[password=1245]&[email=test@email.com]&[tele=0214578963]&[birthday=2008-10-15]

## Api to Create A store To be able to add items [✔ Done]

- http://localhost/Semsar.com/api/Store/create?storeName=My%20store&userId=1

## Api to get store Items [✔ Done]

- http://localhost/Semsar.com/API/store/read?[storeId=2]&[userId=-1]

## Api to add items

- http://localhost/Semsar.com/Api/addNewItem
  -> Steps :
  - Insert item to item table (function return item id)[✔ Done]
  - Insert all images to imgs Table

## Api to like an item [✔ Done]

- http://localhost/Semsar.com/api/LikeItem?[iId=15424&userId=54512]

## Api to Dislike an item [✔ Done]

- http://localhost/Semsar.com/api/DislikeItem?[iId=15424&userId=54512]

## Api to reserve in a rent somewhere [✔ Done]

- http://localhost/Semsar.com/api/reserve?[dateStart=2022-07-23&dateEnd=2022-07-24&itemRes=2&userRes=2]
