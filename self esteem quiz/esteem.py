Negative = -1
Positive = 1


def main():
    print()
    print()
    print('This program is an implementation of the Rosenberg')
    print('Self-Esteem Scale. This program will show you ten')
    print('statements that you could possibly apply to yourself.')
    print('Please rate how much you agree with each of the')
    print('statements by responding with one of these four letters: ')

    print()
    print('D means you strongly disagree with the statement.')
    print('d means you disagree with the statement.')
    print('a means you agree with the statement.')
    print('A means you strongly agree with the statement.')
    print()
    print()

    answer = 0
    answer += user_input(
        '1. I feel that I am a person of worth, at least on an equal plane with others.' 'Enter D, d, a, or A: ' , Positive)
    answer += user_input(
        '2. I feel that I have a number of good qualities.' 'Enter D, d, a, or A: ', Positive)
    answer += user_input(
        '3. All in all, I am inclined to feel that I am a failure.' 'Enter D, d, a, or A: ', Negative)
    answer += user_input(
        '4. I am able to do things as well as most other people.' 'Enter D, d, a, or A: ', Positive)
    answer += user_input(
        '5. I feel I do not have much to be proud of.' 'Enter D, d, a, or A: ', Negative)
    answer += user_input(
        '6. I take a positive attitude toward myself.' 'Enter D, d, a, or A: ', Positive)
    answer += user_input(
        '7. On the whole, I am satisfied with myself.' 'Enter D, d, a, or A: ', Positive)
    answer += user_input(
        '8. I wish I could have more respect for myself.' 'Enter D, d, a, or A: ', Negative)
    answer += user_input(
        '9. I certainly feel useless at times.'
        'Enter D, d, a, or A: ', Negative)
    answer += user_input(
        '10. At times I think I am no good at all. Enter D, d, a, or A: ', Negative)

    print(f'Your score is {answer}')
    print('A score below 15 may indicate problematic low self-esteem.')


def user_input(statement, positive_or_negative):
    print(statement)
    user_answer = input('Enter D, d, a or A: ')
    answer = 0
    if user_answer == 'D':
        answer = 0
    elif user_answer == 'd':
        score = 1
    elif user_answer == 'a':
        answer = 2
    elif user_answer == 'A':
        answer = 3
    if positive_or_negative == Negative:
        answer = 3 - answer

    return answer 

main()
    