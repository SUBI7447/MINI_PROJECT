import mysql.connector
import random

# Replace these values with your MySQL server and database information
host = "localhost"
user = "root"
password = ""
database = "mini_project"

# Establish a connection to the MySQL server
connection = mysql.connector.connect(
    host=host, user=user, password=password, database=database
)

# Create a cursor object to interact with the database
cursor = connection.cursor()

# Truncate the 'question_bank' table to remove all existing data
truncate_query = "TRUNCATE TABLE question_bank"
cursor.execute(truncate_query)


# Define a function to generate a random math question and answer
def generate_random_question():
    a = random.randint(1, 10)
    b = random.randint(1, 10)
    operator = random.choice(["+", "-", "*", "/"])
    question = f"What is {a} {operator} {b}?"
    if operator == "+":
        answer = a + b
    elif operator == "-":
        answer = a - b
    elif operator == "*":
        answer = a * b
    else:
        answer = a / b
    return question, answer


# Insert 5 random math questions and answers into the 'question_bank' table
for _ in range(5):
    question, answer = generate_random_question()
    data_to_insert = {"question": question, "answer": answer}

    # SQL query to insert data into the 'question_bank' table
    insert_query = (
        "INSERT INTO question_bank (QUESTION, ANS) VALUES (%(question)s, %(answer)s)"
    )

    # Execute the query with the data
    cursor.execute(insert_query, data_to_insert)

# Commit the changes to the database
connection.commit()

# Close the cursor and the connection
cursor.close()
connection.close()
