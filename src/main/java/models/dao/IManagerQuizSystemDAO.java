package models.dao;

import models.entities.Options;
import models.entities.Question;
import models.entities.Quiz;

import java.util.*;

public interface IManagerQuizSystemDAO {

    //1. créer un nouveau quiz :
    void addNewQuiz(Quiz quiz);

    //2. ajouter, pour un quiz (QuizID), N questions (par difficulté) aléatoirement :
    void addNQuestion(int nombre, String niveau);

    //3. retourner la liste des quiz non encore passés (sans réponses) :
    List<Quiz> getQuizNoAnswered();

    //4. la liste des questions pour un quiz donné (QuizID) :
    List<Question> getQuestionByQuiz(int idQuiz);

    //5. la liste des options pour une question donnée (QuestionID) :
    List<Options> getOptionsByQuestion(int idQuestion);

    //6. ajouter une réponse à une question (QuestionID) d’un quiz(QuizID) :
    void addAnwserToQuiz(int idQuiz,int idQuestion);

}
