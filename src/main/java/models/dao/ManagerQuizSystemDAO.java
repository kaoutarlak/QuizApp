package models.dao;

import jakarta.persistence.*;
import models.entities.*;

import java.util.*;
import java.util.Random;

public class ManagerQuizSystemDAO implements IManagerQuizSystemDAO {

    EntityManagerFactory managerFactory = Persistence.createEntityManagerFactory("QuizSysteme");
    EntityManager manager = managerFactory.createEntityManager();

    //1. créer un nouveau quiz :
    @Override
    public void addNewQuiz(Quiz quiz) {
        EntityTransaction transaction = manager.getTransaction();
        transaction.begin();
        try {
            manager.persist(quiz);
            transaction.commit();
        } catch (Exception ex) {
            transaction.rollback();
            System.out.println(ex.getMessage());
        }
    }

    @Override
    public void addNQuestion(int nombre, String niveau) {
        EntityTransaction transaction = manager.getTransaction();
        transaction.begin();
        if (nombre > 0) {
            try {
                //Récuprer la dernier id ajouter dans la table des quiz :
                manager.flush();
                Query queryLastID = manager.createQuery("SELECT max(q.id) FROM Quiz q ");
                int idQuiz = (int) queryLastID.getSingleResult();
                //select le nombre des questions trouvées par la difficulté donnée :
                //Query query = manager.createQuery("SELECT q FROM Question q where q.difficulte=:niveau ORDER BY RAND() LIMIT 1",Question.class);
                Query queryCountNbQuestion = manager.createQuery("SELECT count(q) FROM Question q where q.difficulte=:niveau ");
                queryCountNbQuestion.setParameter("niveau",niveau);
                long nbQuestionsFounded = (long) queryCountNbQuestion.getSingleResult();
                if (nombre > nbQuestionsFounded) {
                    nombre = (int)nbQuestionsFounded;
                }
                for (int i = 0; i < nombre; i++) {
                    //Générer un nombre aléatoire à partir de nombre des questions trouvées :
                    Random rand = new Random();
                    int NumberbAlea = rand.nextInt((int)nbQuestionsFounded);
                    //Sélectionner une question aléatoirement dans la base :
                    Query querySelectQuestion = manager.createQuery("SELECT q FROM Question q where q.difficulte=:niveau ");
                    querySelectQuestion.setParameter("niveau",niveau);
                    querySelectQuestion.setFirstResult(NumberbAlea);
                    querySelectQuestion.setMaxResults(1);
                    Question question = (Question) querySelectQuestion.getSingleResult();
                    //Ajouter la question à une quiz donné dans la base:
                    int idQuestion = question.getId();
                    QuizQuestionPK id = new QuizQuestionPK();
                    id.setQuestionID(idQuestion);
                    id.setQuizID(idQuiz);
                    QuizQuestion quizQuestion = new QuizQuestion();
                    quizQuestion.setId(id);
                    quizQuestion.setQuestionQuizQuestion(question);
                    Quiz quiz= manager.find(Quiz.class,idQuiz);
                    quizQuestion.setQuizQuizQuestion(quiz);
                    manager.persist(quizQuestion);
                }
                transaction.commit();
            } catch (Exception ex) {
                transaction.rollback();
                System.out.println(ex.getMessage());
            }
        }

    }

    //2. Passer un quiz :
    @Override
    public List<Quiz> getQuizNoAnswered() {
        EntityTransaction transaction = manager.getTransaction();
        transaction.begin();
        try {
            Query reqSelection = manager.createQuery("select distinct q from Quiz q where q.id not in (select R.quiz.id from Reponse R)");
            List<Quiz> quizList = reqSelection.getResultList();
            transaction.commit();
            return quizList;
        } catch (Exception ex) {
            transaction.rollback();
            System.out.println(ex.getMessage());
        }
        return null;
    }

    @Override
    public List<Question> getQuestionByQuiz(int idQuiz) {
        return null;
    }

    @Override
    public List<Options> getOptionsByQuestion(int idQuestion) {
        return null;
    }

    @Override
    public void addAnwserToQuiz(int idQuiz, int idQuestion) {

    }
}
