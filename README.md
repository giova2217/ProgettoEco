# Progetto Eco

A school project about an eco sustainability blog. You can create articles about topics you care about and also add your own comments to other people's posts!

## Installation

Just install the .zip file of the entire folder. If it's your first time developing in PHP, then install XAMPP following [this guide](https://www.freecodecamp.org/news/how-to-get-started-with-php/#what-is-xampp).

## Contributing

For major changes, please open an issue first
to discuss what you would like to change. Or if you want, you can send me a message on [X](https://x.com/giova2217) about improvements to add or something else that you want to ask.

Every tip you give is more helpful than you think as I want to improve to get better at programming.

## License

[Apache 2.0](https://choosealicense.com/licenses/apache-2.0/)

## User credentials

The admin password is 12345678, while the other users' password are just their usernames.

You can't access the users' accounts since I wrote this line before publishing the code here in Github:

`minlength="8" maxlength="20" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,20}"`

but if you remove it in [line 75 of the file header.php inside the includes folder](https://github.com/giova2217/ProgettoEco/blob/main/includes/header.php#L75), you'll be fine.

I set up those password only as a demo in this repo, they are not the same in the online website [progettoeco.altervista.org](progettoeco.altervista.org), since that code is not exactly the same as the one here in this repo.
