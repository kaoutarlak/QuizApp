package models.entities;

import jakarta.persistence.Column;
import jakarta.persistence.Embeddable;

import java.io.Serializable;
import java.util.Objects;

@Embeddable
public class QuizQuestionPK implements Serializable {

    @Column(name = "QuestionID")
    private int QuestionID;

    @Column(name = "QuizID")
    private int QuizID;

    public QuizQuestionPK() {
    }

    public int getQuestionID() {
        return QuestionID;
    }

    public void setQuestionID(int questionID) {
        QuestionID = questionID;
    }

    public int getQuizID() {
        return QuizID;
    }

    public void setQuizID(int quizID) {
        QuizID = quizID;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        QuizQuestionPK that = (QuizQuestionPK) o;
        return QuestionID == that.QuestionID && QuizID == that.QuizID;
    }

    @Override
    public int hashCode() {
        return Objects.hash(QuestionID, QuizID);
    }
}
