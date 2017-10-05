Feature: link to print invoice on thank you page.

Scenario: Front End

When a logged in user visits a contribution page with pay later enabled
And submits a pending pay later contribution
And confirms a pending pat later contribution
Then on the Thank you page a yellow box will appear at the top with a link to print an invoice
And if the link is clicked an invoice for that contribution will be downloaded

Note if the user is not loggd in no box will show up because anonymous users do not have permissions to print invoices.

Scenario: Back End

When a pending pay later contribution is created on the backend
Then on the next page a yellow box will be displayed at the top that says print invoice
And if the link is clicked an invoice for that contribution will be downloaded
