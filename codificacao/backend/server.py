import hashlib
import os
from typing import Optional
from urllib.parse import urlencode
import uuid
from fastapi import FastAPI, Body, File, Form, HTTPException, UploadFile, status , Path
from fastapi.middleware.cors import CORSMiddleware
from fastapi.responses import RedirectResponse
from fastapi.staticfiles import StaticFiles
from pydantic import BaseModel
from src.presentation.schemas.proprietario_request import ProprietarioRequest
from src.presentation.controllers.profissional_controller import ProfissionalController
from src.presentation.controllers.comentario_controller import ComentarioController
from src.presentation.schemas.comentario_request import ComentarioRequest
from src.presentation.schemas.comentario_response import ComentarioResponse
from src.presentation.controllers.barbearia_controller import BarbeariaController
from src.presentation.controllers.proprietario_controller import ProprietarioController
from src.presentation.schemas.barberia_request import BarbeariaRequest
app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"], 
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

os.makedirs("uploads", exist_ok=True)

app.mount("/uploads", StaticFiles(directory="uploads"), name="uploads")

@app.post('/profissional', status_code=status.HTTP_201_CREATED)
def cadastrar_profissional(nome: str = Body(...), horario_inicio: str = Body(...), horario_fim: str = Body(...), id_barbearia: str = Body(...)):
    controller = ProfissionalController()
    try:
        return controller.cadastrar_profissional(nome, horario_inicio, horario_fim, id_barbearia)
    except ValueError as ve:
        raise HTTPException(status_code=400, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.get('/profissional/{id}', status_code=status.HTTP_200_OK)
def buscar_profissional(id: str = Path(...)):
    controller = ProfissionalController()
    try:
        return controller.buscar_profissional(id)
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.get('/profissionais', status_code=status.HTTP_200_OK)
def listar_profissional():
    controller = ProfissionalController()
    try:
        return controller.listar_profissionais()
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.put('/profissional/{id}', status_code=status.HTTP_200_OK)
def editar_horario(id: str = Path(...), horario_inicio: str = Body(...), horario_fim: str = Body(...)):
    controller = ProfissionalController()
    try:
        return controller.editar_horario(id, horario_inicio, horario_fim)
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.delete('/profissional/{id_profissional}', status_code=status.HTTP_200_OK)
def deletar_profissional(id_profissional: str = Path(...)):
    controller = ProfissionalController()
    try:
        return controller.deletar_profissional(id_profissional)
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.get("/observacoes", status_code=status.HTTP_200_OK)
def listar_observacoes():
    controller = ComentarioController()
    try:
        return controller.listar_comentarios()
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.post("/observacoes", status_code=status.HTTP_201_CREATED)
def criar_observacao(comentario_request: ComentarioRequest):
    controller = ComentarioController()
    try:
        return controller.criar_comentario(comentario_request)
    except ValueError as ve:
        raise HTTPException(status_code=400, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.put("/observacoes/{id_comentario}", status_code=status.HTTP_200_OK)
def atualizar_observacao(id_comentario: str, comentario_request: ComentarioRequest):
    controller = ComentarioController()
    try:
        comentario_request_dict = comentario_request.dict()
        comentario_request_dict["id_comentario"] = id_comentario
        return controller.atualizar_comentario(comentario_request_dict)
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
    
@app.delete("/observacoes/{id_comentario}", status_code=status.HTTP_204_NO_CONTENT)
def deletar_observacao(id_comentario: str):
    controller = ComentarioController()
    try:
        controller.deletar_comentario(id_comentario)
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.post("/criar_proprietario", status_code=status.HTTP_201_CREATED)
def criar_proprietario(
    nome_proprietario: str = Form(...),
    email_proprietario: str = Form(...),
    senha_proprietario: str = Form(...),
    nome: str = Form(...),
    email: str = Form(...),
    endereco: str = Form(...),
    telefone: str = Form(...),
    foto_url: Optional[UploadFile] = File(None),
    horario_abertura: str = Form(...),
    horario_fechamento: str = Form(...),
    descricao: str = Form(...)
):
    try:
        senha_hash = hashlib.sha256(senha_proprietario.encode()).hexdigest()

        proprietario = ProprietarioRequest(
            nome=nome_proprietario,
            email=email_proprietario,
            senha=senha_hash
        )
        proprietario_controller = ProprietarioController()
        novo_proprietario = proprietario_controller.cadastrar_proprietario(proprietario)

        if foto_url:
            os.makedirs("uploads", exist_ok=True)
            nome_arquivo = f"{uuid.uuid4()}_{foto_url.filename}"
            caminho_absoluto = os.path.join("uploads", nome_arquivo)
            with open(caminho_absoluto, "wb") as f:
                f.write(foto_url.file.read())
            caminho_imagem = f"uploads/{nome_arquivo}"
                
        barbearia = BarbeariaRequest(
            nome=nome,
            email=email,
            endereco=endereco,
            telefone=telefone,
            foto_url=caminho_imagem or "",
            horario_abertura=horario_abertura,
            horario_fechamento=horario_fechamento,
            descricao=descricao,
            id_proprietario=str(novo_proprietario.id_proprietario)
        )

        barbearia_controller = BarbeariaController()
        nova_barbearia = barbearia_controller.cadastrar_barbearia(barbearia)

        params = urlencode({
            "id_proprietario": novo_proprietario.id_proprietario,
            "id_barbearia": nova_barbearia.id_barbearia,
            "nome": nome,
            "email": email,
            "endereco": endereco,
            "telefone": telefone,
            "foto_url": caminho_imagem or "",
            "horario_abertura": horario_abertura,
            "horario_fechamento": horario_fechamento,
            "descricao": descricao
        })

        return RedirectResponse(
            url=f"http://localhost:5173/gerenciar_barbearia.html?{params}",
            status_code=303
        )

    except ValueError as ve:
        raise HTTPException(status_code=400, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.get("/barbearias/{id_proprietario}", status_code=status.HTTP_200_OK)
def listar_barbearias_por_proprietario(id_proprietario: str):
    controller = BarbeariaController()
    try:
        return controller.listar_barbearias_por_proprietario(id_proprietario)
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
