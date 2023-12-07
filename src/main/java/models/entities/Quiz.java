package models.entities;

import com.fasterxml.jackson.annotation.JsonIgnore;
import jakarta.persistence.*;

import java.util.*;

@Entity
@Table(name = "Quiz")
public class Quiz {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "QuizID")
    private int id;

    @Column(name = "Titre")
    private String titre;

    @OneToMany(mappedBy = "quiz")
    @JsonIgnore
    private Set<Reponse> reponses;

    @OneToMany(fetch = FetchType.LAZY,cascade = CascadeType.ALL,mappedBy = "quizQuizQuestion")
    private Set<QuizQuestion> quizQuestions ;

    public Quiz() {
        reponses = new HashSet<>();
        quizQuestions = new HashSet<>();
    }

    public Quiz(int id, String titre) {
        this.id = id;
        this.titre = titre;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTitre() {
        return titre;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public Set<Reponse> getReponses() {
        return reponses;
    }

    public void setReponses(Set<Reponse> reponses) {
        this.reponses = reponses;
    }

    public Set<QuizQuestion> getQuizQuestions() {
        return quizQuestions;
    }

    public void setQuizQuestions(Set<QuizQuestion> quizQuestions) {
        this.quizQuestions = quizQuestions;
    }

    @Override
    public String toString() {
        return "Quiz{" +
                "id=" + id +
                ", titre='" + titre + '\'' +
                '}';
    }
}
