package models.entities;

import com.fasterxml.jackson.annotation.JsonIgnore;
import jakarta.persistence.*;

import java.util.*;

@Entity
@Table(name = "Question")
public class Question {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "QuestionID")
    private int id;

    @Column(name = "Enonce")
    private String enonce;

    @Column(name = "Difficulte")
    private String difficulte;

    @OneToMany(mappedBy = "question")
    @JsonIgnore
    private Set<Options> options;

    @OneToMany(fetch = FetchType.LAZY, cascade = CascadeType.ALL, mappedBy = "questionQuizQuestion")
    private Set<QuizQuestion> quizQuestions;

    public Question() {
        options = new HashSet<Options>();
        quizQuestions = new HashSet<QuizQuestion>();
    }

    public Question(int id, String enonce, String difficulte) {
        this.id = id;
        this.enonce = enonce;
        this.difficulte = difficulte;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getEnonce() {
        return enonce;
    }

    public void setEnonce(String enonce) {
        this.enonce = enonce;
    }

    public String getDifficulte() {
        return difficulte;
    }

    public void setDifficulte(String difficulte) {
        this.difficulte = difficulte;
    }

    public Set<Options> getOptions() {
        return options;
    }

    public void setOptions(Set<Options> options) {
        this.options = options;
    }

    public Set<QuizQuestion> getQuizQuestions() {
        return quizQuestions;
    }

    public void setQuizQuestions(Set<QuizQuestion> quizQuestions) {
        this.quizQuestions = quizQuestions;
    }

    @Override
    public String toString() {
        return "Question{" +
                "id=" + id +
                ", enonce='" + enonce + '\'' +
                ", difficulte='" + difficulte + '\'' +
                '}';
    }
}
