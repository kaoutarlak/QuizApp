package com.example.quizsystem;

import jakarta.ws.rs.*;
import jakarta.ws.rs.core.MediaType;

//import jakarta.ws.rs.core.Response;
import models.dao.IManagerQuizSystemDAO;
import models.dao.ManagerQuizSystemDAO;
import models.entities.Quiz;

import java.util.*;
//import org.apache.cxf.rs.security.cors.CrossOriginResourceSharing;

//@CrossOriginResourceSharing(
//        allowOrigins = {"http://localhost:63342"},
//        allowCredentials = true,
//        maxAge = 1,
//        allowHeaders = {"X-custom-1", "X-custom-2"},
//        exposeHeaders = {"X-custom-3", "X-custom-4"}
//)
@Path("/QuizSystem")
public class QuizResource {

    IManagerQuizSystemDAO managerQuiz;

    public QuizResource() {
        this.managerQuiz = new ManagerQuizSystemDAO();
    }

    //1. Générer un nouveau quiz :
    @POST
    @Path("/addNewQuiz")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.TEXT_PLAIN)
    //@CrossOriginResourceSharing(allowOrigins = "*",allowHeaders = "*")
    public String addNewQuiz(Quiz newQuiz) {
        try {
            managerQuiz.addNewQuiz(newQuiz);
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
        return "Quiz bien ajouté";
//        return Response
//                .status(200)
//                .header("Access-Control-Allow-Origin", "*")
//                .header("Access-Control-Allow-Credentials", "true")
//                .header("Access-Control-Allow-Headers",
//                        "origin, content-type, accept, authorization")
//                .header("Access-Control-Allow-Methods",
//                        "GET, POST, PUT, DELETE, OPTIONS, HEAD")
//                .entity("")
//                .build();
    }

    @POST
    @Path("/addQuestionsToQuiz/{niveau}/{nombre}")
    @Produces(MediaType.TEXT_PLAIN)
    public String addQuestionsToQuiz(@PathParam("niveau") String difficulte, @PathParam("nombre") int nbQuestions) {
        try {
            managerQuiz.addNQuestion(nbQuestions, difficulte);
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
        return "QuizQuestion bien ajouté";
    }

    //2. Passer un quiz :
    @GET
    @Path("/listQuizNoPasser")
    @Produces(MediaType.APPLICATION_JSON)
    public List<Quiz> getListQuiz(){
        List<Quiz> quizList = new ArrayList<>();
        try {
            quizList = managerQuiz.getQuizNoAnswered();
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
        return quizList;
    }
}