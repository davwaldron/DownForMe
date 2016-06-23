# DownForMe
Code for a Slack Slash command to check if a website is up or down.

*USAGE*

* Place the downforme.php script on a server running PHP5 with cURL.
* Set up a new custom slash command on your Slack team: https://slack.com/apps/A0F82E8CA-slash-commands
* Under "Choose a command", enter whatever you want for the command. /downforme is easy to remember.
* Under "URL", enter the URL for the script on your server.
* Leave "Method" set to "Post".
* Decide whether you want this command to show in the autocomplete list for slash commands.
* If you do, enter a short description and usage hint.
* Update the downforme.php script with your slash command's token.
