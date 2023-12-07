package models.entities;

import jakarta.persistence.*;

@Entity
@Table(name = "QuizQuestion")
public class QuizQuestion {

    @EmbeddedId
    private QuizQuestionPK id;

    @ManyToOne
    @MapsId("QuestionID")
    @JoinColumn(name = "QuestionID")
    private Question questionQuizQuestion;

    @ManyToOne
    @MapsId("QuizID")
    @JoinColumn(name = "QuizID")
    private Quiz quizQuizQuestion;

    public QuizQuestion() {
    }

    public QuizQuestion(QuizQuestionPK id) {
        this.id = id;
    }

    public QuizQuestionPK getId() {
        return id;
    }

    public void setId(QuizQuestionPK id) {
        this.id = id;
    }

    public Question getQuestionQuizQuestion() {
        return questionQuizQuestion;
    }

    public void setQuestionQuizQuestion(Question question) {
        this.questionQuizQuestion = question;
    }

    public Quiz getQuizQuizQuestion() {
        return quizQuizQuestion;
    }

    public void setQuizQuizQuestion(Quiz quiz) {
        this.quizQuizQuestion = quiz;

    }

    @Override
    public String toString() {
        return "QuizQuestion{" +
                "id=" + id +
                ", question=" + questionQuizQuestion +
                ", quiz=" + quizQuizQuestion +
                '}';
    }
}
