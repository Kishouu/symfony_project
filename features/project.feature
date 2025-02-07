Feature: Project Features

  # User Registration
  Scenario: Successful registration
    Given I am on the registration page
    When I fill in "email" with "user@example.com"
    And I fill in "password" with "password123"
    And I press "Register"
    Then I should see "Registration successful"

  Scenario: Registration with existing email
    Given I am on the registration page
    When I fill in "email" with "existing@example.com"
    And I fill in "password" with "password123"
    And I press "Register"
    Then I should see "Email already exists"

  # User Login
  Scenario: Successful login
    Given I am on the login page
    When I fill in "email" with "user@example.com"
    And I fill in "password" with "password123"
    And I press "Login"
    Then I should see "Welcome, user@example.com"

  Scenario: Login with incorrect password
    Given I am on the login page
    When I fill in "email" with "user@example.com"
    And I fill in "password" with "wrongpassword"
    And I press "Login"
    Then I should see "Invalid credentials"

  # User Profile
  Scenario: View profile
    Given I am logged in as "user@example.com"
    When I go to the profile page
    Then I should see "Email: user@example.com"

  Scenario: Edit profile
    Given I am logged in as "user@example.com"
    When I go to the profile page
    And I fill in "first name" with "John"
    And I fill in "last name" with "Doe"
    And I press "Save"
    Then I should see "Profile updated successfully"

  # Password Reset
  Scenario: Request password reset
    Given I am on the password reset page
    When I fill in "email" with "user@example.com"
    And I press "Request reset"
    Then I should see "Password reset email sent"

  Scenario: Reset password with invalid email
    Given I am on the password reset page
    When I fill in "email" with "invalid@example.com"
    And I press "Request reset"
    Then I should see "Email not found"

  # Change Password
  Scenario: Successful password change
    Given I am logged in as "user@example.com"
    When I go to the change password page
    And I fill in "current password" with "password123"
    And I fill in "new password" with "newpassword456"
    And I press "Change password"
    Then I should see "Password changed successfully"

  Scenario: Change password with incorrect current password
    Given I am logged in as "user@example.com"
    When I go to the change password page
    And I fill in "current password" with "wrongpassword"
    And I fill in "new password" with "newpassword456"
    And I press "Change password"
    Then I should see "Current password is incorrect"

  # Create Post
  Scenario: Successful post creation
    Given I am logged in as "user@example.com"
    When I go to the create post page
    And I fill in "title" with "My First Post"
    And I fill in "content" with "This is the content of my first post."
    And I press "Create post"
    Then I should see "Post created successfully"

  Scenario: Create post with missing title
    Given I am logged in as "user@example.com"
    When I go to the create post page
    And I fill in "title" with ""
    And I fill in "content" with "This is the content of my first post."
    And I press "Create post"
    Then I should see "Title is required"

  # Edit Post
  Scenario: Successful post edit
    Given I am logged in as "user@example.com"
    And I have a post titled "My First Post"
    When I go to the edit post page for "My First Post"
    And I fill in "title" with "Updated Post Title"
    And I fill in "content" with "This is the updated content."
    And I press "Save changes"
    Then I should see "Post updated successfully"

  Scenario: Edit post with missing content
    Given I am logged in as "user@example.com"
    And I have a post titled "My First Post"
    When I go to the edit post page for "My First Post"
    And I fill in "title" with "Updated Post Title"
    And I fill in "content" with ""
    And I press "Save changes"
    Then I should see "Content is required"

  # Delete Post
  Scenario: Successful post deletion
    Given I am logged in as "user@example.com"
    And I have a post titled "My First Post"
    When I go to the delete post page for "My First Post"
    And I press "Delete post"
    Then I should see "Post deleted successfully"

  Scenario: Delete non-existent post
    Given I am logged in as "user@example.com"
    When I go to the delete post page for "Non-existent Post"
    And I press "Delete post"
    Then I should see "Post not found"

  # Comment on Post
  Scenario: Successful comment creation
    Given I am logged in as "user@example.com"
    And I am viewing a post titled "My First Post"
    When I fill in "comment" with "This is a comment."
    And I press "Post comment"
    Then I should see "Comment posted successfully"

  Scenario: Comment with empty content
    Given I am logged in as "user@example.com"
    And I am viewing a post titled "My First Post"
    When I fill in "comment" with ""
    And I press "Post comment"
    Then I should see "Comment cannot be empty"

  # View Comments
  Scenario: View comments on a post
    Given I am viewing a post titled "My First Post"
    Then I should see "Comments"
    And I should see "This is a comment."

  Scenario: View comments on a post with no comments
    Given I am viewing a post titled "My First Post"
    Then I should see "No comments yet."
