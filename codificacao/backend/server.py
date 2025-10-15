from fastapi import FastAPI, Body, HTTPException, status , Path
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from src.presentation.controllers.comentario_controller import ComentarioController
from src.presentation.schemas.comentario_request import ComentarioRequest
from src.presentation.schemas.comentario_response import ComentarioResponse
from src.presentation.controllers.barbearia_controller import BarbeariaController
from src.presentation.schemas.barberia_request import BarbeariaRequest
from src.presentation.schemas.barbearia_response import BarbeariaResponse
app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],        
    allow_credentials=False,     
    allow_methods=["*"],        
    allow_headers=["*"],        
)

class EmailCheckRequest(BaseModel):
    email: str
    disponivel: bool

@app.get("/observacoes", status_code=status.HTTP_200_OK)
def listar_observacoes():
    controller = ComentarioController()
    try:
        return controller.listar_comentarios()
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.post("/observacoes", status_code=status.HTTP_201_CREATED)
def criar_observacao(comentario: ComentarioRequest = Body(...)) -> ComentarioResponse:
    controller = ComentarioController()
    try:
        return controller.criar_comentario(comentario)
    except ValueError as ve:
        raise HTTPException(status_code=400, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.post("/observacoes/", status_code=status.HTTP_200_OK)
def atualizar_observacao(comentario = Body(...)):
    controller = ComentarioController()
    try:
        return {controller.atualizar_comentario(comentario)}
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.delete("/observacoes/{id_comentario}", status_code=status.HTTP_204_NO_CONTENT)
def deletar_observacao(id_comentario: str):
    controller = ComentarioController()
    try:
        controller.deletar_comentario(id_comentario)
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.post("/criar_barbearia", status_code=status.HTTP_201_CREATED)
def criar_barbearia(barbearia: BarbeariaRequest = Body(...)) -> BarbeariaResponse:
    controller = BarbeariaController()
    try:
        return controller.cadastrar_barbearia(barbearia)
    except ValueError as ve:
        raise HTTPException(status_code=400, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
