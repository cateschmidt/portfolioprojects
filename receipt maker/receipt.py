import csv
from datetime import datetime
print('--------------------------------------------')
print()
print('Thank you for visiting the Pirate store!')
print()
print('--------------------------------------------')
print()
print()
KEY_INDEX = 0
VALUE_INDEX = 1
PRICE_INDEX = 2


subtotal_list = []
amount_list = []
def main():
    
    # Call the read_dict function and stores the compound dictionary in a variable
    #  named products_dict.
    products_dict = read_dict("products.csv", KEY_INDEX)

    # print dictionary
    print('******************************')
    print('Your order list is as follows:')
    print('******************************')
    print()
    #print(products_dict)

    # Open the request.csv file for reading.

    with open("request.csv", "rt") as request_file:
        reader = csv.reader(request_file)
        next(reader)
        # create a loop that reads and processes each row from the request.csv file.
        num_items = 0
        subtotal = 0
        tax_rate = 0.06
        for request in reader:
            key = request[KEY_INDEX]
            request_value = int(request[VALUE_INDEX])
        
            # Use the requested product number to find the corresponding item in the products_dict.
            if key in products_dict:
                value = products_dict[key]
                title = value[VALUE_INDEX]
                product_price = float(value[PRICE_INDEX])
                # Print the product name, requested quantity, and product price.
                print(f"{title}: {request_value} @ {product_price}")
                print()
            num_items += request_value
            subtotal += request_value * product_price
            tax_subtotal = subtotal * tax_rate
            tax_total = tax_subtotal + subtotal
        current_date_time = datetime.now()
        print()
        print(f"Number of items: {num_items}")
        print(f"Subtotal: ${subtotal:.2f}")
        print(f"Tax: ${tax_subtotal:.2f}")
        print(f"Your total is: ${tax_total:.2f}")
    print()
    print("-------------------------------------------")
    print("Thank you for shopping at the Pirate Store!")
    print("--------------------------------------------")
    print()
    print(f"{current_date_time:%c}")
    print()
    print()
    
        



def read_dict(filename, key_column_index):
    """Read the contents of a CSV file into a compound
    dictionary and return the dictionary.

    Parameters
        filename: the name of the CSV file to read.
        key_column_index: the index of the column
            to use as the keys in the dictionary.
    Return: a compound dictionary that contains
        the contents of the CSV file.
    """

    # Create a dictionary that will
    # store the data from the CSV file.
    products_dictionary = {}
    # Open the CSV file for reading and store a reference
    # to the opened file in a variable named products_file
    with open(filename, "rt") as products_file:

        # Use the csv module to create a reader object
        # that will read from the opened CSV file.
        reader = csv.reader(products_file)
        next(reader)
        # Read the rows in the CSV file one row at a time.
        # The reader object returns each row as a dictionary.
        for product in reader:

            # Append one row from the CSV
            # file to the compound dictionary
            product_list = product[key_column_index]
            products_dictionary[product_list] = product

    # Return the compound dictionary.
    return products_dictionary



if __name__ == "__main__":
    main()




