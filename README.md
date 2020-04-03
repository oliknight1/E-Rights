# E-Rights
E-learning web application prototype

## How to use

### Using GitHub
Clone the repository to your local machine. When you want to make changes first switch to the 'testing' branch, and then create a new bracnch from there, __be careful not branch directly from master.__ Then when you think you're feature is complete push it into testing and we will all test to make sure it fully works , only then do we push to master branch

**DO NOT EDIT FILES DIRECTLY IN THE MASTER BRANCH!**


Super easy to make that mistake but can lead to trouble.

Don't be afraid to make multiple branches e.g master -> testing -> nav-web -> nav-mobile ->nav-tablet etc., more branches the more organizded.

Always add a message to the commit, make it clear what you did, makes it easier in the long run.

### Working locally
When it comes to working locally it is likely we will have to constantly upload to Brighton Domaisn because of the database, but I am not 100% sure right now as depends how to PHP works. To make this as easy as possible use this vscode extension - https://marketplace.visualstudio.com/items?itemName=liximomo.sftp

This essentially creates a FileZilla in vscode, press f1 and type sftp:config, it will open a file and that is where you put your configuration, it should look like this:

`{


    "name": "Brighton Domains",
    "host": "USERNAME.brighton.domains",
    "protocol": "sftp",
    "port": 22,
    "username": "USERNAME",
    "remotePath": "/home/ok131/public_html/ci536/site",
    "uploadOnSave": true
`}

__"remotePath": is where you specify the exact folder that you want to open so this will change depending on how you files are setup. You may also put "password" in so you dont need to put your password in everytime you satrt a new session but i haven't done that, you don't need to enter your password every upload so isn't that annoying 



## Workflow

If we work feature by feature that will be the best way of working (pretty sure it's also the Agile way of working) e.g I create the navigation for desktop, then instead of moving onto the rest of the page, I make sure the nav works on all screen sizes.

Break down tasks into as small tasks as possible (sprints) makes testing and feedback faster.

Also make sure to comment everything, even if it seems obvious to you it may not be obvious to everyone and makes reviewing the code way faster

### Naming conventions

Make sure your names are clear and as concise as possible. e.g no box1, box2 if it can be helped

Also use 'wrapper' and 'container' as much as possible as they're common naming conventions e.g:

<div class = "course-wrapper">
  <div class = "course-container">
    <div class = "course-img">
   
   etc.,
    
  


  
